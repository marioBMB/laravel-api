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



/* rotta raggiungibile solo da /admin */
/* N.B. non si è scritto il prefix perché in api.php è di default già /api, quindi inserendolo diverrebbe /api/api/posts */

Route::namespace('Api')->name('api.')->group(function() { 
    Route::get("/posts", "PostController@index")->name('posts');
    Route::get("/posts/{post}", "PostController@show")->name('post');
    Route::get("/posts/category/{category}", "PostController@filterByCategory")->name('posts.category');
    Route::get("/posts/tag/{tag}", "PostController@filterByTag")->name('posts.tag');
    Route::get("/posts/tags/{tags}", "PostController@filterByTags")->name('posts.tags');
    
    Route::get("/categories", "CategoryController@index")->name('categories');
    
});