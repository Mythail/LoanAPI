<?php

namespace app\controllers;

use app\actions\RequestCreateAction;
use Override;

/**
 * @noinspection PhpUnused
 */

class RequestsController extends ApiController
{
    #[Override]
    public function actions(): array
    {
        return [
            'create' => RequestCreateAction::class,
        ];
    }
}
