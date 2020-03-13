<?php

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
//Index Route for the Resource Controller - News page
Route::resource('/', 'NewsController', ['only' => 'index']);

//Remaining Routes for Resource Controller
Route::resource('/news', 'NewsController', ['except' => 'index'])->middleware('auth');

Auth::routes();

//Route for users dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Route to Show all users on for only Admin's view
Route::get('/dashboard/show', 'DashboardController@showUsers')->name('users.show')->middleware(['auth', 'admin']);

//Route for Deleting single user by the Admin
Route::delete('/dashboard/show/{user}', 'DashboardController@delUsers')->name('user.destroy')->middleware(['auth', 'admin']);
