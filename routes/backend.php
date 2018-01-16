<?php

$router->get('/', 'NonAuth\LoginController@index')->name($locale.'.backend.login');
$router->post('/', 'NonAuth\LoginController@store');

$router->get('dashboard', 'Auth\DashboardController@index')->name($locale.'.backend.dashboard');
$router->get('logout', 'Auth\LogoutController@index')->name($locale.'.backend.logout');
