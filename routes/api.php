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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api', 'checkPassword', 'changeLanguage'], 'namespace' => 'Api'], function () {
  Route::post('get-main-categories', 'CategoriesController@index');
  Route::post('get-category-by-id', 'CategoriesController@getCategoryById');
  Route::post('change-category-status', 'CategoriesController@changeCategoryStatus');
});