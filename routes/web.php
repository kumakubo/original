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
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class,'top'])->name('home');


use App\Http\Controllers\Admin\PostController;
Route::controller(PostController::class)->prefix('mypage')->name('mypage.')->group(function () {
    Route::get('/', 'show')->name('mypage.show');
    Route::get('manga', 'myposts')->name('manga.myposts');
    Route::get('manga/create', 'create')->name('manga.create');
    Route::get('manga/edit', 'edit')->name('manga.edit');
    });
    
    
 use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('mypage')->name('mypage.')->group(function () {
    Route::get('create_profile', 'create')->name('profile.create');
    Route::get('edit_profile', 'edit')->name('profile.edit');
    Route::get('profile/create', 'create')->name('profile.create');
    Route::get('profile/edit', 'update')->name('profile.update');
    });


use App\Http\Controllers\ShowController as PublicShowController;
Route::get('/manga', [PublicShowController::class, 'index'])->name('manga.index');
Route::get('/manga/post', [PublicShowController::class, 'show'])->name('manga.show');


use App\Http\Controllers\ProfileController as PublicProfileController;
Route::get('/user_profile', [PublicProfileController::class, 'show'])->name('profile.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
