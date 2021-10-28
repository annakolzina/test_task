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

    Route::get('/document/search/{class?}', [App\Http\Controllers\DocumentController::class, 'search'])->name('document.search');
    Route::get('/document/many/{class?}/{value?}/{type?}', [App\Http\Controllers\DocumentController::class, 'allFromUser'])->name('document.many');
    Route::get('/user/search', [App\Http\Controllers\UserController::class, 'search'])->name('user.search');
    Route::get('/document/download/{document}', [App\Http\Controllers\DocumentController::class, 'downloadFile'])->name('document.download');
    Route::resource('/document', 'DocumentController');
    Route::resource('/user', 'UserController');
    Route::get('/', [App\Http\Controllers\DocumentController::class, 'create'])->name('home');

});


Auth::routes();
