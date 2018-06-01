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

//Route::resource('photo', 'PhotoController', ['except' => ['create', 'store', 'update', 'destroy']]);

// list vacancies
Route::get('vacancies', 'VacanciesController@index');

// list single vacancy
Route::get('vacancy/{id}', 'VacanciesController@show');

// Create new vacancy
Route::post('vacancy', 'VacanciesController@store');

// Update artcle
Route::put('vacancy', 'VacanciesController@store');

//delete
Route::delete('vacancy/{id}', 'VacanciesController@destroy');
