<?php

$router->get('dashboard', 'Auth\DashboardController@index')->name('backend.dashboard');
$router->get('logout', 'Auth\LogoutController@index')->name('backend.logout');