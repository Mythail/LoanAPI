<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Контроллер, настроенный для API-маршрутов
 */
class ApiController extends Controller
{
    /** @var bool Отключение CSRF */
    public $enableCsrfValidation = false;
}
