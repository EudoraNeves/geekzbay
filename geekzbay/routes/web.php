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

Route::get('/', function () {
    return view('layouts.home');
})->name('home');
Route::get('/buddy', function () {
    return view('layouts.buddy');
})->name('buddy');
Route::get('/meetup', function () {
    return view('layouts.meetup');
})->name('meetup');
Route::get('/community', function () {
    return view('layouts.community');
})->name('community');
Route::get('/locations', function () {
    return view('layouts.locations');
})->name('locations');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
