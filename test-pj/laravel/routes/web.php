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
Route::get('/shared/{user}', 'ProfilesController@show')->name('shared.debate');
Route::get('/shared', 'SharedController@index')->name('shared.friends');

Route::get('/newfriends', 'NewfriendsController@index')->name('shared.newfriends');

// shared & topics
// これで１トピックごとのページへ飛ぶ。飛んだ先ではアウトラインを紐付ける、トピック毎にurlをつける
Route::get('/topics/{debate_topics}', 'TopicController@show');
Route::get('/topics', 'TopicController@index')->name('shared.topiccatalog');
Route::get('/selected/{debate_topics}', 'TopicController@custom')->name('shared.topiccatalog');

Route::get('/topic-register', 'TopicController@store');


// outlines
Route::post('/outline', 'OutlineController@store');


Route::get('/graph/', function() {
    return view('graph.graph');
});