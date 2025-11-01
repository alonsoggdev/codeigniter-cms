<?php

namespace Modules\CMS\Config;

use Modules\CMS\Filters\AuthFilter;

class Register
{
    public static function Filters()
    {
        return [
            'aliases' => [
                'auth' => AuthFilter::class,
            ],
        ];
    }
}
