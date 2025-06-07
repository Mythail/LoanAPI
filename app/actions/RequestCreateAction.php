<?php

namespace app\actions;

use app\components\ResponseHelper;
use app\models\LoanRequest;
use app\services\LoanService;
use Codeception\Util\HttpCode;
use Yii;
use yii\base\Action;
use yii\db\Exception;

class RequestCreateAction extends Action
{
    public function run(): array
    {
        $modelRequest = new LoanRequest();
        $modelRequest->load(Yii::$app->request->post(), '');

        if (!$modelRequest->validate()) {
            return ResponseHelper::jsonError();
        }

        $loanService = new LoanService();

        // проверка, нет ли одобренных заявок
        if ($loanService->hasApprovedRequest($modelRequest->user_id)) {
            return ResponseHelper::jsonError();
        }

        try {
            if ($modelRequest->save()) {
                return ResponseHelper::jsonSuccess(
                    data: [
                        'result' => true,
                        'id'     => $modelRequest->id
                    ],
                    statusCode: HttpCode::CREATED
                );
            }
        } catch (Exception $e) {
            Yii::error('Failed to save the loan request: ' . $e->getMessage());
        }

        return ResponseHelper::jsonError(HttpCode::INTERNAL_SERVER_ERROR);
    }
}
