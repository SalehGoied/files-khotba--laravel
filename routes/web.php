<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () { 
    return view('welcome');
});



Route::get('/files', 'FilesController@index')->name('files.index');
Route::get('/files/create', 'FilesController@create')->name('files.create')->middleware('auth');
Route::post('/files', 'FilesController@store')->name('files.store');
Route::get('/files/{file}', 'FilesController@show')->name('files.show');
Route::get('/files/{file}/edit', 'FilesController@edit')->name('files.edit');
Route::patch('/files/{file}', 'FilesController@update')->name('files.update');
Route::delete('files/{file}/delete', 'FilesController@destroy')->name('files.destroy');

Route::get('profile/{user}', 'ProfilesController@index')->name('profiles.index');
Route::get('profile/{user}/edit', 'ProfilesController@edit')->name('profiles.edit');
Route::patch('profile/{user}', 'ProfilesController@update')->name('profiles.update');
Route::get('/profile/{user}/files', 'ProfilesController@show')->name('profiles.show');

Route::get('/comment/{file}', 'CommentController@index')->name('comment.index')->middleware('auth');
Route::post('/comment/{file}', 'CommentController@create')->name('comment.create')->middleware('auth');
