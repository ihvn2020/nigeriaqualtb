<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->group(function () {
    Route::post('/login', [App\Http\Controllers\TasksController::class, 'login']);
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/newAPIAggReport', [App\Http\Controllers\TasksController::class, 'newAPIAggReport']);
    Route::post('/save-aggreport-issue', [App\Http\Controllers\TasksController::class, 'newAPIAggReportIssue']);
    Route::post('/save-qi-activity', [App\Http\Controllers\TasksController::class, 'addAppQI']);

});

Route::get('/states', [App\Http\Controllers\TasksController::class, 'getStates']);
Route::get('/facilities', [App\Http\Controllers\TasksController::class, 'getFacilities']);
Route::post('/register-user', [App\Http\Controllers\TasksController::class, 'registerUser']);
Route::get('/admin-comments', [App\Http\Controllers\TasksController::class, 'adminComments']);


// HELP NMRS MINISTRY
Route::get('/ndrmatch_status/{pepfarid}/{facilityDatimCode}', [App\Http\Controllers\TasksController::class, 'ndrMatchStatus']);


Route::group(['middleware' => 'web'], function () {
    Route::get('/csrf-token', [App\Http\Controllers\TasksController::class, 'getCsrfToken']);

});

// GET INDICATORS
Route::get('/indicators', [App\Http\Controllers\TasksController::class, 'getIndicators']);

