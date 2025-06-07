<?php

namespace app\services;

use app\enums\LoanStatus;
use app\models\LoanRequest;

class LoanService
{
    /**
     * Проверяет, есть ли у пользователя одобренные заявки
     *
     * @param int $userId ID пользователя
     *
     * @return bool
     */
    public function hasApprovedRequest(int $userId): bool
    {
        return LoanRequest::find()
            ->where([
                'user_id' => $userId,
                'status'  => LoanStatus::APPROVED->value,
            ])
            ->exists();
    }
}