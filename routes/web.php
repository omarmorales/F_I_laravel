<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'PagesController@index')->name('index');
Route::get('/aboutus', 'PagesController@aboutus')->name('aboutus');
Route::get('/whatwedo', 'PagesController@whatwedo')->name('whatwedo');
Route::get('/vacancies', 'PagesController@vacancies')->name('sitevacancies');
Route::get('/vacancies/{vacancy}', 'VacanciesController@showSite')->name('vacancy.show');
Route::resource('/applications', 'ApplicationController', ['only' => ['store']]);

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|user|admintalento')->group(function(){
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users', 'UserController');
  Route::resource('/roles', 'RolesController');
  Route::resource('/permissions', 'PermissionsController');
  Route::resource('/posts', 'PostController');
  Route::resource('/tags', 'TagController');
  Route::resource('/employees', 'EmployeeController');
  Route::resource('/vacancies', 'VacanciesController');
  Route::resource('/applications', 'ApplicationController', ['except' => ['store']]);
  Route::resource('/media_types', 'MediaTypeController');
  Route::resource('/media', 'MediaController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');
