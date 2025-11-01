<?php

namespace Modules\CMS\Config;

use CodeIgniter\Router\RouteCollection;
use Modules\CMS\Controllers\AuthController;
use Modules\CMS\Controllers\Dashboard;

$routes->group('admin', ['filter' => 'auth'], static function (RouteCollection $routes) {
    $routes->get('/', [Dashboard::class, 'index']);
    $routes->get('dashboard', [Dashboard::class, 'index']);
});

$routes->group('admin', static function (RouteCollection $routes) {
    $routes->get('login', [AuthController::class, 'login']);
    $routes->post('login', [AuthController::class, 'attemptLogin']);
    $routes->get('logout', [AuthController::class, 'logout']);
});
