<?php

$router->get('/', 'NonAuth\LoginController@index')->name($locale.'.backend.login');
$router->post('/', 'NonAuth\LoginController@store');