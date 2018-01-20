<?php

$router->get('dashboard', 'Auth\DashboardController@index')->name($locale.'.backend.dashboard');
$router->get('logout', 'Auth\LogoutController@index')->name($locale.'.backend.logout');