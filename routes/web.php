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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Pages
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/page_edit/{id}', 'AdminController@pageEdit')->name('page_edit');
Route::get('/page_create', 'AdminController@pageCreate')->name('page_create');
Route::post('/page_create', 'AdminController@pageCreateSubmit')->name('page_create');
Route::post('/page_edit/{id}', 'AdminController@pageEditSubmit')->name('page_edit');

//Modules
Route::get('/module', 'ModuleController@index')->name('module');

Route::get('/profile', 'ProfileController@index')->name('profile');
