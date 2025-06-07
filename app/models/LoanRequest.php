<?php

namespace app\models;

use Override;
use yii\db\ActiveRecord;

/**
 * Модель формы подачи заявки на займ
 *
 * @property int|null $id ID заявки
 */
class LoanRequest extends ActiveRecord
{
    /**
     * @var int ID пользователя, подающего заявку
     */
    public int $user_id;

    /** @var int Сумма займа, которую пользователь запрашивает */
    public int $amount;

    /** @var int Срок займа в днях */
    public int $term;

    /**
     * @return string название таблицы в БД
     */
    #[Override]
    public static function tableName(): string
    {
        return 'requests';
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
        ];
    }
}
