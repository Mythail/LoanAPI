<?php

namespace app\controllers;

use app\actions\RequestProcessAction;
use Override;
use yii\web\Controller;

/**
 * @noinspection PhpUnused
 */

class ProcessorController extends Controller
{
    #[Override]
    public function actions(): array
    {
        return [
            'process' => RequestProcessAction::class,
        ];
    }
}
