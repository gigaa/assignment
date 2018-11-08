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

Route::match(['get', 'post'],'articles','ArticleController@index');
// Route::get('articles/{id}','ArticleController@showdataapi');
Route::get('articles/{id}/comments','ArticleController@showcomments');
Route::get('tags','ArticleController@showtags');
Route::get('/tags/{id}/articles','ArticleController@articletag');