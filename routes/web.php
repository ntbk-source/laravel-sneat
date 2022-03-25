<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
	return view('home');
})->name('home')->middleware(['auth']);

Route::controller(UserController::class)->middleware('role:admin')->name('users.')->group(function () {
	Route::get('/users', 'index')->name('index');
	Route::post('/users', 'store')->name('store');
	Route::get('/users/create', 'create')->name('create');
	Route::get('/users/{user}/edit', 'edit')->name('edit');
	Route::put('/users/{user}/update', 'update')->name('update');
	Route::delete('/users/{user}/delete', 'delete')->name('delete');
});

require 'auth.php';
