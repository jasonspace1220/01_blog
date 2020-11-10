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
Route::get('/{path}', function () {
    return view('welcome');
})->where('path', '^((?!api).)*$');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/gg',function(){
//     echo phpinfo();
// });

// Route::get('/abc','AbcController@index');
// Route::get('/abc/create','AbcController@create');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
