<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('areas', AreaController::class);
    $router->resource('houses', HouseController::class);
    $router->resource('properties', PropertyController::class);
    $router->resource('purchases', PurchaseController::class);
    $router->resource('consumers', ConsumerController::class);
});
