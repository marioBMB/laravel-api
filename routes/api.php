<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* in questa parte (middleware) vanno le rotte admin dove le API permettono di fare modifiche ad es. sul db 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/


Route::get("/posts", "Api\PostController@index")->name('api.posts');
Route::get("/posts/{post}", "Api\PostController@show")->name('api.post');
Route::get("/posts/category/{category}", "Api\PostController@index")->name('api.posts.category');