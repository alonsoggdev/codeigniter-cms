<?php

namespace Modules\CMS\Config;

use Modules\CMS\Filters\AuthFilter;

class Registrar
{
    public static function Modules(): array
    {
        return [
            'filters' => [
                'aliases' => [
                    'auth' => AuthFilter::class,
                ],
            ],
        ];
    }
}
