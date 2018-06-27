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
Route::get('/vacancies/{vacancy}', 'VacanciesController@public')->name('vacancies.public');

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator|user')->group(function(){
  Route::get('/', 'ManageController@index');
  Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
  Route::resource('/users', 'UserController');
  Route::resource('/roles', 'RolesController');
  Route::resource('/permissions', 'PermissionsController');
  Route::resource('/employees', 'EmployeeController');
  Route::resource('/vacancies', 'VacanciesController');
  Route::resource('/applications', 'ApplicationController');
  Route::resource('/media_types', 'MediaTypeController');
  Route::resource('/media', 'MediaController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');
