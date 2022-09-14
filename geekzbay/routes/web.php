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

//content pages
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


//account access pages
Route::get('/profile', function () {
    return view('layouts.profile');
})->name('profile');
Route::get('/buddy/my-buddies', function () {
    return view('layouts.my-buddies');
})->name('my-buddies');
Route::get('/meetup/my-meetups', function () {
    return view('layouts.my-meetups');
})->name('my-meetups');
Route::get('/community/my-communities', function () {
    return view('layouts.my-communities');
})->name('my-communities');
Route::get('/locations/my-locations', function () {
    return view('layouts.my-locations');
})->name('my-locations');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
