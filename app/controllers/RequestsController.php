<?php

namespace app\controllers;

use app\actions\RequestCreateAction;
use Override;
use yii\web\Controller;

/**
 * @noinspection PhpUnused
 */

class RequestsController extends Controller
{
    #[Override]
    public function actions(): array
    {
        return [
            'create' => RequestCreateAction::class,
        ];
    }
}
