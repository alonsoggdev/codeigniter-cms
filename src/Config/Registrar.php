<?php

namespace Modules\CMS\Config;

use Modules\CMS\Filters\AdminAuth;

class Registrar
{
    public static function Modules(): array
    {
        return [
            'filters' => [
                'aliases' => [
                    'auth' => AdminAuth::class,
                ],
            ],
        ];
    }
}
