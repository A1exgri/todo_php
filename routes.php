<?php

$router->get('', 'TaskController@home');
$router->post('add', 'TaskController@store');
$router->post('delete', 'TaskController@delete');
$router->post('update', 'TaskController@update');

$router->get('login', 'UserController@login');
$router->post('logout', 'UserController@logout');
$router->post('auth', 'UserController@auth');
