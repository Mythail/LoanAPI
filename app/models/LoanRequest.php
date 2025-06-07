<?php

namespace app\models;

use app\enums\LoanStatus;
use Override;
use yii\db\ActiveRecord;

/**
 * Модель заявки на займ
 *
 * @property int|null $id ID заявки
 * @property int $user_id ID пользователя, подающего заявку
 * @property int $amount Сумма займа, которую пользователь запрашивает
 * @property int $term Срок займа в днях
 * @property string $status Статус рассмотрения
 * @property string $created_at Дата и время подачи
 */
class LoanRequest extends ActiveRecord
{
    /**
     * @return string название таблицы в БД
     */
    #[Override]
    public static function tableName(): string
    {
        return 'requests';
    }

    #[Override]
    public function init(): void
    {
        parent::init();
        $this->status = LoanStatus::PENDING->value;
    }

    /**
     * @return array правила валидации параметров
     */
    #[Override]
    public function rules(): array
    {
        return [
            // Обязательные параметры
            [['user_id', 'amount', 'term'], 'required'],
            // Типы параметров
            [['user_id', 'amount', 'term'], 'integer'],
            // Валидация значений
            [['amount', 'term'], 'number', 'min' => 1],
        ];
    }
}
