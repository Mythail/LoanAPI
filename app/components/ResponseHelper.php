<?php

namespace app\components;

use Yii;
use yii\web\Response;

class ResponseHelper
{
    /**
     * Возвращает успешный ответ на запрос в формате JSON
     *
     * @param array $data Дополнительные данные
     * @param int $statusCode Код ответа
     *
     * @return array
     */
    public static function jsonSuccess(array $data = [], int $statusCode = 200): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->statusCode = $statusCode;

        return [
            'result' => true,
            ...$data
        ];
    }

    /**
     * Возвращает ошибочный ответ на запрос в формате JSON
     *
     * @param int $statusCode Код ответа
     *
     * @return array
     */
    public static function jsonError(int $statusCode = 400): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->statusCode = $statusCode;

        return [
            'result' => false
        ];
    }
}