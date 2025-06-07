<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class RequestsController extends Controller
{
    public function actionRequest(): Response|string
    {
        $response = Yii::$app->response;

        return $response->statusText = 'requested';
    }
}
