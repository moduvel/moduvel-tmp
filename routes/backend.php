<?php

use Moduvel\Core\Http\Middlewares\RedirectIfAuthenticated;
use Moduvel\Core\Http\Middlewares\BackendAuthenticate;

$router->group(['middleware' => RedirectIfAuthenticated::class], function($router) use ($locale) {
    $router->get('/', 'NonAuth\LoginController@index')->name($locale.'.backend.login');
    $router->post('/', 'NonAuth\LoginController@store');
});

$router->group(['middleware' => BackendAuthenticate::class], function($router) use ($locale) {
    $router->get('dashboard', 'Auth\DashboardController@index')->name($locale.'.backend.dashboard');
    $router->get('logout', 'Auth\LogoutController@index')->name($locale.'.backend.logout');
});
