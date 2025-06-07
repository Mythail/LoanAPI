<?php

namespace app\enums;

/** Статусы рассмотрения заявок на займ */
enum LoanStatus: string
{
    /** Одобрена */
    case APPROVED = 'approved';

    /** Отклонена */
    case DECLINED = 'declined';

    /** В ожидании (еще не обработана) */
    case PENDING = 'pending';
}