<?php

namespace app\actions;

use Yii;
use yii\base\Action;
use yii\web\Response;

class RequestCreateAction extends Action
{
    public function run(): array
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'result' => true,
            'id' => rand(1, 100),
        ];
    }
}
