<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\LocationController;
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
Route::get('/buddy/add', [UserController::class, 'addBuddy'])->name('addBuddy');
// Route::get('/buddy/my-buddies', [UserController::class, 'index'])->name('my-buddies');
// Meetups --> create an event 
Route::get('/meetup', [MeetupController::class, 'show'])->name('meetup');
Route::put('/meetup/add_event', [MeetupController::class, 'store'])->middleware('isLoggedIn');
// Route::get('/meetup/my-meetups', [MeetupController::class, 'index'])->name('my-meetups');
// Communities
Route::get('/community', [CommunityController::class, 'show'])->name('community');
// Route::get('/community/my-communities', [CommunityController::class, 'index'])->name('my-communities');
// Locations
Route::get('/locations', [LocationController::class, 'show'])->name('locations');
Route::get('/location/{id}', [LocationController::class, 'show'])->name('location');
// Route::get('/locations/my-locations', [LocationController::class, 'index'])->name('my-locations');
// Profile
// Route::get('/profile', [UserController::class, 'showMyProfile'])->name('profile');
// Route::get('/my-profile/edit', [UserController::class, 'editMyProfile'])->name('my-profile.edit');
// Route::post('/my-profile', [UserController::class, 'updateMyProfile'])->name('my-profile.update');

 Route::middleware('auth')->group(function () {    
    // Buddies
    Route::get('/buddy/my-buddies', [UserController::class, 'index'])->name('my-buddies');
    // Meetups --> create an event 
    Route::get('/meetup/my-meetups', [MeetupController::class, 'index'])->name('my-meetups');
    // Communities
    Route::get('/community/my-communities', [CommunityController::class, 'index'])->name('my-communities');
    // Locations
    Route::get('/locations/my-locations', [LocationController::class, 'index'])->name('my-locations');
    // Profile
    Route::get('/profile', [UserController::class, 'showMyProfile'])->name('profile');
    Route::get('/my-profile/edit', [UserController::class, 'editMyProfile'])->name('my-profile.edit');
    Route::post('/my-profile', [UserController::class, 'updateMyProfile'])->name('my-profile.update');
});


Route::get('/', function () {
    return view('layouts.home');
})->name('home');


//account access pages
Route::get('/my-profile', function () {
    return view('layouts.my-profile');
})->name('my-profile');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
