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


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@frontPageIndex')->name('posts-page.index');
Route::get('/post-detail/{id}', 'PostController@show')->name('post-detail.show');
Route::get('/contact-us', 'ContactController@frontPageIndex')->name('contact-us.index');
Route::resource('consults', 'ConsultController')->only('store');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::resource('consults', 'ConsultController');
    Route::resource('contacts', 'ContactController');
    Route::resource('categories', 'CategoryController')->except('show');
    Route::resource('posts', 'PostController')->except('show');
    Route::resource('banners', 'BannerController')->except('show');
    Route::resource('proud_memebers', 'ProudMemeberController')->except('show');
    Route::resource('socials','SocialController')->except('show');
    Route::resource('galleries', 'GalleryController')->except('show');
Route::resource('statistics', 'StatisticController')->except('show');
});

Route::get('/user/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('force_to_logout');


