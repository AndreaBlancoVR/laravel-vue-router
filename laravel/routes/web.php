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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function() {
      
        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('posts', 'Postcontroller')->except(['show']);
    
    });


    // tutto quello che non verrà intercettato 
    // dalle rotte precedenti finirà nella seguente

// Route::get('{any?}', function($param) {
//     return view('guest.home');
//     })->where('any', '.*');

Route::fallback(function() {
    return view('guest.home');
    });