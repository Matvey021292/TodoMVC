<?php

use Buki\Router\Router;

require_once __DIR__ . '/../config/config.php';
require __DIR__ . '/../vendor/autoload.php';

$params = [
    'paths' => [
        'controllers' => 'app/Controllers',
    ],
    'namespaces' => [
        'controllers' => 'App\Controllers',
    ],
    'base_folder' => __DIR__ . '/../',
];

$router = new Router($params);


$router->get('/', 'App\Controllers\IndexController@show');
$router->get('/task/add', 'App\Controllers\TaskController@show');
$router->post('/task/add', 'App\Controllers\TaskController@add');
$router->get('/task/edit/:id', 'App\Controllers\TaskController@edit');
$router->post('/task/update/:id', 'App\Controllers\TaskController@update');

$router->get('/login', 'App\Controllers\LoginController@show');
$router->post('/login', 'App\Controllers\LoginController@login');
$router->get('/logout', 'App\Controllers\LoginController@logout');

$router->run();