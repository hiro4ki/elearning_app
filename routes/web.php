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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/users', 'AdminController@index')->name('admin.users');
Route::get('admin/category/add', 'AdminController@add_category')->name('admin.add_category');
Route::get('admin/category/{id}/edit', 'AdminController@edit_category')->name('admin.edit_category');
Route::get('admin/category/question/{id}/edit', 'AdminController@edit_question')->name('admin.edit_question');
Route::patch('admin/category/question/{id}/update', 'AdminController@update_question')->name('admin.question_update');

Route::get('admin/category/{id}/question/add', 'AdminController@add_question')->name('admin.add_question');
Route::post('admin/category/{id}/question/store', 'AdminController@question_store')->name('admin.question_store');

Route::patch('admin/category/{id}/update', 'AdminController@update_category')->name('admin.category_update');


Route::post('admin/category/store/', 'AdminController@category_store')->name('admin.category_store');


Route::delete('/admin/category/{id}/destroy', 'AdminController@destroy_category')->name('category.destroy');
