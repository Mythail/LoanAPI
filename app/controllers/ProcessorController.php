<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class ProcessorController extends Controller
{
    public function actionProcess(): Response|string
    {
        $response = Yii::$app->response;

        return $response->statusText = 'processed';
    }
}
