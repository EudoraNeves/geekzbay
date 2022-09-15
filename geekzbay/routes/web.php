<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;

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

// Buddies
Route::get('/buddy', [UserController::class, 'show'])->name('buddy');
Route::get('/buddy/my-buddies', [UserController::class, 'index'])->name('my-buddies');
// Meetups
Route::get('/meetup', [EventController::class, 'show'])->name('meetup');
Route::get('/meetup/my-meetups', [EventController::class, 'index'])->name('my-meetups');
// Communities
Route::get('/community', [CommunityController::class, 'show'])->name('community');
Route::get('/community/my-communities',[CommunityController::class, 'index'])->name('my-communities');
// Locations
Route::get('locations', [PlaceController::class, 'show'])->name('locations');
Route::get('/locations/my-locations', [PlaceController::class, 'index'])->name('my-locations');


Route::get('/', function () {
    return view('layouts.home');
})->name('home');


//account access pages
Route::get('/profile', function () {
    return view('layouts.profile');
})->name('profile');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
