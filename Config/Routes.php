<?php

use CodeIgniter\Router\RouteCollection;
use Modules\CMS\Controllers\AuthController;
use Modules\CMS\Controllers\Dashboard;

$routes->group('admin', ['filter' => 'auth'], static function (RouteCollection $routes) {
    $routes->get('/', [Dashboard::class, 'index']);
    $routes->get('dashboard', [Dashboard::class, 'index']);
});

$routes->get('admin/login', [AuthController::class, 'login']);
$routes->post('admin/login', [AuthController::class, 'attemptLogin']);
$routes->get('admin/logout', [AuthController::class, 'logout']);