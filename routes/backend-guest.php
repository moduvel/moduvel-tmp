<?php

$router->get('/', 'NonAuth\LoginController@index')->name('backend.login');
$router->post('/', 'NonAuth\LoginController@store');