<?php

use Illuminate\Support\Facades\Route;
use App\Mail\NewUserwelcomeMail;

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

Route::get('/', );

Auth::routes();

Route::get('/email', function(){
    return new NewUserwelcomeMail();
});

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show');
Route::post('/p', 'PostsController@store');

                                                // name here means Route Name, refer the laravel official with restful 
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


// shared pages
Route::get('/shared/{user}', 'ProfilesController@show')->name('shared.show');
Route::get('/shared', 'SharedController@index')->name('shared.wating_room');
