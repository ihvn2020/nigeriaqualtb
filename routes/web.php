<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Auth::routes();
// ->middleware('role:editor,approver');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// MEMBERS
Route::get('/members', [App\Http\Controllers\HomeController::class, 'members'])->name('members')->middleware('role:Worker,Admin,Followup,Pastor,Finance,Super');
Route::get('/dscaptures', [App\Http\Controllers\HomeController::class, 'dscaptures'])->name('dscaptures')->middleware('role:Worker,Admin,Followup,Pastor,Finance,Super');
Route::get('/add-newds', [App\Http\Controllers\HomeController::class, 'addNewds'])->name('add-newds')->middleware('role:Super');
Route::post('/addnewds', [App\Http\Controllers\HomeController::class, 'newds'])->name('addnewds')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/edit-dscapture/{id}', [App\Http\Controllers\HomeController::class, 'editdscapture'])->name('edit-dscapture')->middleware('role:Super');


Route::get('/add-newdr', [App\Http\Controllers\HomeController::class, 'addNewdr'])->name('add-newdr')->middleware('role:Super');
Route::post('/addnewdr', [App\Http\Controllers\HomeController::class, 'newdr'])->name('addnewdr')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/drcaptures', [App\Http\Controllers\HomeController::class, 'drcaptures'])->name('drcaptures')->middleware('role:Worker,Admin,Followup,Pastor,Finance,Super');
Route::get('/edit-drcapture/{id}', [App\Http\Controllers\HomeController::class, 'editdrcapture'])->name('edit-drcapture')->middleware('role:Super');


Route::get('/edit-member/{id}/', [App\Http\Controllers\HomeController::class, 'editMember'])->name('edit-member')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/member/{id}/', [App\Http\Controllers\HomeController::class, 'member'])->name('member')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/my_profile/{id}/', [App\Http\Controllers\HomeController::class, 'member'])->name('my_profile')->middleware('role:Member,Worker,Admin,Followup,Pastor,Super');
Route::get('/delete-member/{id}', [App\Http\Controllers\HomeController::class, 'deleteMember'])->name('delete-member')->middleware('role:Admin,Followup,Pastor,Super');
Route::post('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings')->middleware('role:Super');
Route::post('/searchmembers', [App\Http\Controllers\HomeController::class, 'membersSearch'])->name('searchmembers')->middleware('role:Worker,Admin,Followup,Pastor,Finance,Super');

// TASKS / TO DOs
Route::post('/newtask', [App\Http\Controllers\TasksController::class, 'store'])->name('newtask')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::post('/newfollowup', [App\Http\Controllers\TasksController::class, 'newfollowup'])->name('newfollowup')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/completetask/{id}', [App\Http\Controllers\TasksController::class, 'completetask'])->name('completetask')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/inprogresstask/{id}', [App\Http\Controllers\TasksController::class, 'inprogresstask'])->name('inprogresstask')->middleware('role:Worker,Admin,Followup,Pastor,Super');
Route::get('/delete-task/{id}', [App\Http\Controllers\TasksController::class, 'destroy'])->name('destroy')->middleware('role:Super');
Route::get('/delete-followup/{id}', [App\Http\Controllers\TasksController::class, 'deletefollowup'])->name('delete-followup')->middleware('role:Worker,Admin,Followup,Pastor,Super');

// COMMUNICATION
Route::get('/communications', [App\Http\Controllers\HomeController::class, 'communications'])->name('communications')->middleware('role:Admin,Super,Pastor');
Route::post('/sendsms', [App\Http\Controllers\HomeController::class, 'sendSMS'])->name('sendsms')->middleware('role:Admin,Super,Pastor');
Route::get('/sentmessages', [App\Http\Controllers\HomeController::class, 'sentSMS'])->name('sentmessages')->middleware('role:Admin,Super,Pastor');

// HELP AND SECURITY
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
Route::get('/security', [App\Http\Controllers\HomeController::class, 'security'])->name('security');