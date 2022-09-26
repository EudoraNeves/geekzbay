<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersInMeetupsController;

//content pages

// Meetups --> create an event
Route::get('/meetups', [MeetupController::class, 'index'])->name('meetup');
Route::get('/meetups/{id}', [MeetupController::class, 'show'])->name('meetups');
Route::post('/meetups/{id}', [UsersInMeetupsController::class, 'store'])->name('meetups');
Route::post('/meetups', [MeetupController::class, 'store'])->middleware('auth');

// Communities
Route::get('/community', [CommunityController::class, 'show'])->name('community');

// Locations
Route::get('locations', [LocationController::class, 'index'])->name('locations');
Route::get('location/{id}', [LocationController::class, 'show'])->name('location');

//Only accessable if logged
 Route::group(['middleware' => 'auth'], function () {
    // Buddies
    Route::get('/buddy/my-buddies', [UserController::class, 'index_my_buddies'])->name('my-buddies');
    // Meetups --> create an event
    Route::get('/meetup/my-meetups', [UsersInMeetupsController::class, 'index'])->name('my-meetups');
    // Communities
    Route::get('/community/my-communities', [CommunityController::class, 'index_my_communities'])->name('my-communities');
    // Locations
    Route::get('/locations/my-locations', [LocationController::class, 'index_my_locations'])->name('my-locations');
    // Profile
    Route::get('/my-profile', [UserController::class, 'showMyProfile'])->name('my-profile');
    Route::get('/my-profile/edit', [UserController::class, 'editMyProfile'])->name('my-profile.edit');
    Route::post('/my-profile', [UserController::class, 'updateMyProfile'])->name('my-profile.update');
    Route::post('/my-profile/change-password', [UserController::class, 'changePassword'])->name('change-password');
});

// Buddies
Route::get('/buddy', [UserController::class, 'show_random_buddy'])->name('buddy');
Route::get('/buddy/{buddy_id}', [UserController::class, 'addBuddy'])->name('addBuddy');

//home page
Route::get('/', function () {
    return view('layouts.home');
})->name('home');

//auth routes
require __DIR__ . '/auth.php';
