<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersInMeetupsController;

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


Route::get('/', function () {
    return view('layouts.home');
})->name('home');


//account access pages
// Route::get('/my-profile', function () {
//     return view('layouts.my-profile');
// })->name('my-profile');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
