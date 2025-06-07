<?php

namespace app\controllers;

use app\actions\RequestProcessAction;
use Override;

/**
 * @noinspection PhpUnused
 */

class ProcessorController extends ApiController
{
    #[Override]
    public function actions(): array
    {
        return [
            'process' => RequestProcessAction::class,
        ];
    }
}
