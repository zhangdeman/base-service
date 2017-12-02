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
*/

Route::middleware('auth:api')->post('/user', function (Request $request) {
    return $request->user();
});

Route::post('/test', function (Request $request) {
    $instance = new \App\Http\Controllers\Test();
    $instance->testInterface($request);
});

Route::get('/getId', function (Request $request) {
    $instance = new \App\Http\Controllers\Common\GetId();
    $instance->getUniqueId($request);
});

Route::post('/admin/addAdmin', function (Request $request) {
    $instance = new \App\Http\Controllers\Admin\Add();
    $instance->addAdmin($request);
});

Route::post('/admin/login', function (Request $request) {
    $instance = new \App\Http\Controllers\Admin\Login();
    $instance->doLogin($request);
});

Route::get('/article/getArticleKind', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\Kind();
    $instance->getArticleKind($request);
});


