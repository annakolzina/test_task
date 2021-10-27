<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function (){

    Route::get('/document/search/{my?}', [App\Http\Controllers\DocumentController::class, 'search'])->name('document.search');
    Route::get('/document/many/{my?}/{value?}/{type?}', [App\Http\Controllers\DocumentController::class, 'allFromUser'])->name('document.many');
    Route::get('/user/search', [App\Http\Controllers\UserController::class, 'search'])->name('user.search');
    Route::get('/document/sh/{document}', [App\Http\Controllers\DocumentController::class, 'showFile'])->name('document.sh');
    Route::get('/document/download/{document}', [App\Http\Controllers\DocumentController::class, 'downloadFile'])->name('document.download');
    Route::resource('/document', 'DocumentController');
    Route::resource('/user', 'UserController');

});


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
