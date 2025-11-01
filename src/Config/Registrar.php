<?php

namespace Modules\CMS\Config;

class Registrar
{
    public static function Modules(): array
    {
        return [
            'filters' => [
                'aliases' => [
                    'auth' => \Modules\CMS\Filters\AdminAuth::class,
                ],
            ],
        ];
    }
}
