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

//Default Route
Route::get('/', 'LandingController@index');

Auth::routes();

//Group Middleware
Route::middleware(['admin'])->group(function() {
    Route::get('/home', 'AdminController@index')->name('home');
    Route::resource('objek_wisata', 'ObjekWisataController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('lampiran', 'LampiranController');
    Route::resource('info_objek', 'InfoObjekController');
    Route::resource('pengaturan', 'PengaturanController');
});

Route::get('/about', 'LandingController@about')->name('about');
Route::get('/contact', 'LandingController@contact')->name('contact');
