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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/login', [App\Http\Controllers\TasksController::class, 'login']);
});


Route::get('/states', [App\Http\Controllers\TasksController::class, 'getStates']);

Route::get('/facilities', [App\Http\Controllers\TasksController::class, 'getFacilities']);
Route::post('/register-user', [App\Http\Controllers\TasksController::class, 'registerUser']);


Route::group(['middleware' => 'web'], function () {
    Route::get('/csrf-token', [App\Http\Controllers\TasksController::class, 'getCsrfToken']);

});
