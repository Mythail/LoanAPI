<?php

namespace app\actions;

use app\models\LoanRequest;
use Codeception\Util\HttpCode;
use Yii;
use yii\base\Action;
use yii\db\Exception;
use yii\web\Response;

class RequestCreateAction extends Action
{
    public function run(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $modelRequest = new LoanRequest();
        $modelRequest->load(Yii::$app->request->post(), '');

        if (!$modelRequest->validate()) {
            Yii::$app->response->statusCode = HttpCode::BAD_REQUEST;
            return ['result' => false];
        }

        try {
            if ($modelRequest->save()) {
                Yii::$app->response->statusCode = HttpCode::CREATED;

                return [
                    'result' => true,
                    'id'     => $modelRequest->id
                ];
            }
        } catch (Exception $e) {
            Yii::error('Failed to save the loan request: ' . $e->getMessage());
        }

        Yii::$app->response->statusCode = HttpCode::INTERNAL_SERVER_ERROR;
        return ['result' => false];
    }
}
