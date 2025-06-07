<?php

namespace app\actions;

use app\components\ResponseHelper;
use app\enums\LoanStatus;
use app\models\LoanRequest;
use app\services\LoanService;
use Yii;
use yii\base\Action;
use yii\db\Exception;

class RequestProcessAction extends Action
{
    public function run(int $delay = 0): array
    {
        $loanService = new LoanService();

        /**
         * @var int[] $usersCache
         * Временный массив-кэш для сокращения количества ненужных запросов в БД
         */
        $approvedUsersList = [];

        /** @var LoanRequest[] $pendingRequests */
        $pendingRequests = LoanRequest::find()
            ->where([
                'status' => LoanStatus::PENDING->value,
            ])
            ->all();

        foreach ($pendingRequests as $request) {
            $isCached = in_array($request->user_id, $approvedUsersList, true);

            // Если у пользователя уже есть одобренная заявка, отклоняем сразу
            if ($isCached || $loanService->hasApprovedRequest($request->user_id)) {
                $request->status = LoanStatus::DECLINED->value;

                if (!$isCached) {
                    // Добавляем ID пользователя в кэш
                    $approvedUsersList[] = $request->user_id;
                }
            } else {
                // Ожидание перед принятием решения...
                sleep($delay);

                // 10% шанс одобрения
                $approve = mt_rand(1, 10) === 1;

                $request->status = $approve
                    ? LoanStatus::APPROVED->value
                    : LoanStatus::DECLINED->value;

                if ($approve) {
                    // Добавляем ID пользователя в кэш
                    $approvedUsersList[] = $request->user_id;
                }
            }

            try {
                $request->save(false);
            } catch (Exception $e) {
                Yii::error('Failed to update the loan request: ' . $e->getMessage());
            }
        }

        // Можно добавить "неуспешный" ответ, если ни одна заявка не одобрена,
        // но в ТЗ нет такого требования
        return ResponseHelper::jsonSuccess();
    }
}
