<?php

use App\Http\Controllers\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1
// used for all things related to searches
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\v1'], function() {
    Route::apiResource('communities', CommunitySearchController::class);
    Route::apiResource('locations', LocationSearchController::class);
    Route::apiResource('meetups', MeetupSearchController::class);
});

Route::post('/locations/my-locations', [LocationController::class, 'add_to_my_locations'])->name('add_to_my_locations');