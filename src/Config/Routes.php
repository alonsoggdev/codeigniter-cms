<?php

namespace Modules\CMS\Config;

use CodeIgniter\Router\RouteCollection;
use Modules\CMS\Controllers\Auth;



$routes->group('admin', static function (RouteCollection $routes) {
    $routes->get('login', [Auth::class, 'login']);
    $routes->post('login', [Auth::class, 'login']);
    $routes->get('logout', [Auth::class, 'logout']);
});
