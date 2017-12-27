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

Route::post('/passport/validateToken', function (Request $request) {
    $instance = new \App\Http\Controllers\Admin\Token();
    $instance->validateToken($request);
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
    $instance = new \App\Http\Controllers\Article\GetArticleKindList();
    $instance->getList($request);
});

Route::post('/article/addArticle', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\AddArticle();
    $instance->createArticle($request);
});

Route::get('/article/getArticleList', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\GetArticleList();
    $instance->getList($request);
});

Route::get('/article/getArticleDetail', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\GetArticleDetail();
    $instance->getArticle($request);
});

Route::post('/articleKind/add', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\Kind();
    $instance->addArticleKind($request);
});

Route::get('/articleKind/list', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\GetArticleKindList();
    $instance->getList($request);
});

Route::get('/articleKind/detail', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\GetArticleKindDetail();
    $instance->detail($request);
});

Route::post('/articleKind/update', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\UpdateArticleKind();
    $instance->update($request);
});

Route::post('/articleKind/delete', function (Request $request) {
    $instance = new \App\Http\Controllers\Article\DeleteArticleKind();
    $instance->delete($request);
});

Route::get('/permission/getList', function (Request $request) {
    $instance = new \App\Http\Controllers\Permission\GetPermissionList();
    $instance->getList($request);
});

Route::post('/permission/add', function (Request $request) {
    $instance = new \App\Http\Controllers\Permission\AddPermission();
    $instance->add($request);
});

Route::get('/permission/getRolePermission', function (Request $request) {
    $instance = new \App\Http\Controllers\Permission\GetRolePermission();
    $instance->getList($request);
});

Route::post('/permission/authAdminPermission', function (Request $request) {
    $instance = new \App\Http\Controllers\Permission\AuthAdminPermission();
    $instance->authPermission($request);
});
