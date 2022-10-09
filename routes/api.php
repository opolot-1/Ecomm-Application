<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
// */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$router->group(['prefix'  =>   'api/v1'], function() use($router){

    $router->get('/', 'Admin\CategoryController@index');//->name('admin.categories.index');
    $router->get('/create', 'Admin\CategoryController@create');//->name('admin.categories.create');
    $router->post('/store', 'Admin\CategoryController@store');//->name('admin.categories.store');
    $router->get('/{id}/edit', 'Admin\CategoryController@edit');//->name('admin.categories.edit');
    $router->post('/update', 'Admin\CategoryController@update');//->name('admin.categories.update');
    $router->get('/{id}/delete', 'Admin\CategoryController@delete');//->name('admin.categories.delete');

});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', 'UsersController@login');
    Route::post('/register', 'UsersController@register');
    Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
});
