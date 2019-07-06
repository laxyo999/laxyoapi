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

Route::Resource('/admin/Page', 'PageController', [
    'as' => 'admin'
]);
Route::Resource('/admin/PageCategory', 'PageCategoryController', [
    'as' => 'admin'
]);
// Route::resource('page_categories', 'PageCategoriesController');


// Route::group(['prefix' => 'admin'], function () {
//     Route::get('/PageCategory', 'PageCategoryController@index');
//     Route::match(['get', 'post'], 'create', 'PageCategoryController@create');
//     Route::match(['get', 'put'], 'update/{id}', 'PageCategoryController@update');
//     Route::delete('delete/{id}', 'PageCategoryController@delete');
// });