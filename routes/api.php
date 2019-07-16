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

Route::post('/article', 'ArticleController@create')->name('article-create');
Route::post('/article/{id}', 'ArticleController@update')->name('article-update');
Route::get('/article', 'ArticleController@index')->name('article-index');
Route::get('/article/{id}', 'ArticleController@get')->name('article-get');
Route::delete('/article/{id}', 'ArticleController@delete')->name('article-delete');

Route::post('/category', 'CategoryController@create')->name('category-create');
Route::post('/category/{id}', 'CategoryController@update')->name('category-update');
Route::get('/category', 'CategoryController@index')->name('category-index');
Route::get('/category/{id}', 'CategoryController@get')->name('category-get');
Route::delete('/category/{id}', 'CategoryController@delete')->name('category-delete');

Route::get('/articles-category/{categoryId}', 'ArticleController@getArticlesByCategoryId')->name('category-articles');