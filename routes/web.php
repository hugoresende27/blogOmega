<?php

use App\Http\Middleware\CheckStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', [PagesController::class, 'index']);


// Route::post('/cinema/create/', [CinemaController::class, 'create']);
Route::resource('/cinema', CinemaController::class);



Route::resource('/blog',PostsController::class );

Auth::routes();


Route::get('/search/', 'App\Http\Controllers\HomeController@search')->name('search');

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware([CheckStatus::class])->group(function(){

    Route::get('/allusers', [AdminController::class, 'viewAllusers'] );
    Route::get('/mailtemplate', [AdminController::class, 'viewMailTemplate'] );
    Route::get('/teste', [AdminController::class, 'teste'] );
});





Route::get('/uploadphoto', [UserController::class, 'uploadPhoto']);
Route::post('/uploadphoto_save', [UserController::class, 'uploadPhoto_save']);
// Route::get('/myprofile', [UserController::class, 'myprofile']);
Route::get('/profile/{id}', [UserController::class, 'profile']);

Route::resource('/comments', CommentsController::class);
Route::get('/comments/create/{id}', [CommentsController::class, 'create']);
Route::post('/comments/savecomment', [CommentsController::class, 'store']);
// Route::put('/comments/{id}/update', [CommentsController::class, 'update']);


