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

Route::apiResources(['post' => 'API\PostController']);
Route::get('findPost', 'API\PostController@search');
Route::get('findPressPost', 'API\PostController@searchpress');
Route::get('findGeneralPost', 'API\PostController@searchgeneral');
Route::get('generalPosts', 'API\PostController@general');
Route::get('pressPosts', 'API\PostController@press');
Route::get('findPostbyTag', 'API\PostController@postbytag');
Route::get('findGeneralPostbyTag', 'API\PostController@generalpostbytag');
Route::get('findPressPostbyTag', 'API\PostController@presspostbytag');
Route::apiResources(['vacancy' => 'API\VacancyController']);
