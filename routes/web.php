<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('front');
});

Auth::routes();  /* crea le rotte relative all'autenticazione, ovvero login/logout e register */


# Route::get('/home', 'HomeController@index')->name('home');  /* rotta raggiungibile da tutti */


/* rotta raggiungibile solo da /admin */
/* i controller  non permettono di definire cose in modo personalizzato, come ad es. lo slug al posto dell'id */
/* N.B. PRECEDENZE: quando voglio personalizzare una specifica regola del resource, devo prima mettere la regola del resource e poi quella specifica! */

Route::middleware('auth')
->namespace('Admin') /* con questo diciamo dove devono puntare i vari Controllers */
->name('admin.')  /* base della rotta con dot notation da anteporre ai percorsi nel group */
->prefix('admin')
->group(function() { /* group() applica tutte le precedenti alle rotte definite dentro la sua function */
    Route::get("/", 'HomeController@index')->name('home'); /* indirizzo qui viene aggiunto a /admin */
    Route::resource("/posts", 'PostController')->except(['show']);
    Route::get('/posts/{post:slug}', 'PostController@show' )->name('posts.show');
    Route::resource("/categories", 'CategoryController' )->except(['show']);
    Route::get('/categories/{category:slug}', 'CategoryController@show' )->name('categories.show');
}); 

/*
Route::get('/posts/{post:slug}', function (Post $post) {
    return $post;
});
*/

/* 
Area pubblica – Front-office
questa regola serve per girare tutte le altre rotte non definite prima sul front
*/
Route::get("{any?}", function(){
    return view("front");
})->where("any", ".*");

/* any è un segnaposto che viene convertito in  qualsiasi indirizzo dalla where */
