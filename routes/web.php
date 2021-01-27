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

//User Route
Route::get('/', 'LandingController@index');
Route::get('/about', 'LandingController@about')->name('about');
Route::get('/contact', 'LandingController@contact')->name('contact');
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/category/{id}', 'CategoriesController@show')->name('category');

Auth::routes();

//Group Middleware Admin
Route::middleware(['admin'])->group(function() {
    Route::get('/home', 'AdminController@index')->name('home');
    Route::resource('objek_wisata', 'ObjekWisataController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('lampiran', 'LampiranController');
    Route::resource('info_objek', 'InfoObjekController');
    Route::resource('pengaturan', 'PengaturanController');
});
