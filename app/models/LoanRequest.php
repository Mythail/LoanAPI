<?php

namespace app\models;

use Override;
use yii\db\ActiveRecord;

/**
 * Модель формы подачи заявки на займ
 *
 * @property int|null $id ID заявки
 * @property int $user_id ID пользователя, подающего заявку
 * @property int $amount Сумма займа, которую пользователь запрашивает
 * @property int $term Срок займа в днях
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
