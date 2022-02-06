<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\CommentController;
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

// Route::get('/home', function () {
//     return view('home');
//  });

//  Route::get('/profile', function () {
//     return view('profile');
//    });

   // Route::get('/configuration', function () {
   //  return view('configuration');
   // });
    
//    Route::get('/', function () {
//     return view('app');
//    });

Auth::routes();
Route::get('/', function(){
   return view('inicio');

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/configuration', [App\Http\Controllers\UserController::class, 'config'] )->name('config');
Route::get('/profileus', [App\Http\Controllers\UserController::class, 'profileus'] )->name('profileus');
Route::get('/user/avatar/{filename}', [App\Http\Controllers\UserController::class, 'getImage'] )->name('user.avatar');
Route::get('/image/profile/{filename}', [App\Http\Controllers\UserController::class, 'getImage1'] )->name('image.profile');
Route::get('/image/profilep/{filename}', [App\Http\Controllers\UserController::class, 'getImage2'] )->name('image.profilep');
Route::get('/upload-image', [App\Http\Controllers\ImageController::class, 'create'] )->name('image.create');
Route::post('/image/save', [App\Http\Controllers\ImageController::class, 'save'] )->name('image.save');
Route::get('/image/file/{filename}', [App\Http\Controllers\ImageController::class, 'getImage'] )->name('image.file');
Route::get('/image/{id}', [App\Http\Controllers\ImageController::class, 'detail'] )->name('image.detail');
Route::post('/comment/save', [App\Http\Controllers\CommentController::class, 'save'] )->name('comment.save');
Route::get('/comment/delete/{id}', [App\Http\Controllers\CommentController::class, 'delete'] )->name('comment.delete');
Route::get('/like/{image_id}', [App\Http\Controllers\LikeController::class, 'like'] )->name('like.save');
Route::get('/dislike/{image_id}', [App\Http\Controllers\LikeController::class, 'dislike'] )->name('dislike.save');
Route::get('/likes', [App\Http\Controllers\LikeController::class, 'index'] )->name('likes');
Route::get('/profile/{id}', [App\Http\Controllers\UserController::class, 'profile'] )->name('profile');
Route::get('/image/delete/{id}', [App\Http\Controllers\ImageController::class, 'delete'] )->name('image.delete');
Route::get('/imagen/edit/{id}', [App\Http\Controllers\ImageController::class, 'edit'] )->name('image.edit');
Route::post('/image/update', [App\Http\Controllers\ImageController::class, 'update'] )->name('image.update');
Route::get('/gente/{search?}', [App\Http\Controllers\UserController::class, 'index'] )->name('index');



//Route::get('/upload', [App\Http\Controllers\imageController::class, 'create'])->name('getImage');
//Route::post('/upload', [App\Http\Controllers\imageController::class, 'store'])->name('postImage');

Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('update');