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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

// SCREENING
Route::get('/screenings', [App\Http\Controllers\ScreeningController::class, 'index'])->name('screenings')->middleware('role:Super');
Route::get('/new-screening', [App\Http\Controllers\ScreeningController::class, 'create'])->name('new-screening')->middleware('role:Super');
Route::post('/addnewscreening', [App\Http\Controllers\ScreeningController::class, 'store'])->name('addnewscreening')->middleware('role:Worker,Admin,Super');
Route::get('/edit-screening/{id}/', [App\Http\Controllers\ScreeningController::class, 'editScreening'])->name('edit-screening')->middleware('role:Super');


//FACILITIES
// SCREENING
Route::get('/facilities', [App\Http\Controllers\FacilitiesController::class, 'index'])->name('facilities')->middleware('role:Super');
Route::get('/new-facility', [App\Http\Controllers\FacilitiesController::class, 'create'])->name('new-facility')->middleware('role:Super,Admin');
Route::post('/addfacility', [App\Http\Controllers\FacilitiesController::class, 'store'])->name('addfacility')->middleware('role:Worker,Admin,Super');
Route::get('/edit-facility/{id}/', [App\Http\Controllers\FacilitiesController::class, 'editFacility'])->name('edit-facility')->middleware('role:Super');


// TB ENTRY
Route::get('/members', [App\Http\Controllers\HomeController::class, 'members'])->name('members')->middleware('role:Worker,Admin,Finance,Super');
Route::get('/dscaptures', [App\Http\Controllers\HomeController::class, 'dscaptures'])->name('dscaptures')->middleware('role:Worker,Admin,Finance,Super');
Route::get('/add-newds', [App\Http\Controllers\HomeController::class, 'addNewds'])->name('add-newds')->middleware('role:Super');
Route::get('/new-dscapture/{screenid}/', [App\Http\Controllers\HomeController::class, 'NewdsCapture'])->name('new-dscapture')->middleware('role:Super,Admin');
Route::post('/addnewds', [App\Http\Controllers\HomeController::class, 'newds'])->name('addnewds')->middleware('role:Worker,Admin,Super');
Route::get('/edit-dscapture/{id}/', [App\Http\Controllers\HomeController::class, 'editdscapture'])->name('edit-dscapture')->middleware('role:Super');

// DELETE
Route::get('/delete/{id}/{table}/', [App\Http\Controllers\ScreeningController::class, 'genericDelete'])->name('delete')->middleware('role:Admin,Super');

// Route::get('/new-areport', [App\Http\Controllers\HomeController::class, 'newAreport'])->name('new-areport')->middleware('role:Super,Admin');

Route::get('/aggreports', [App\Http\Controllers\AggreportController::class, 'index'])->name('aggreports')->middleware('role:Super,Admin,User');
Route::get('/new-activity', [App\Http\Controllers\HomeController::class, 'newActivity'])->name('new-activity')->middleware('role:Super');
Route::post('/newreport', [App\Http\Controllers\HomeController::class, 'newReport'])->name('newreport')->middleware('role:Super,Admin,User');
Route::get('/aggregate-report', [App\Http\Controllers\HomeController::class, 'newAreport'])->name('aggregate-report')->middleware('role:Super,Admin,User');
Route::post('/newareport', [App\Http\Controllers\HomeController::class, 'newAggreport'])->name('newareport')->middleware('role:Super,Admin,User');
Route::get('/view-report/{id}/', [App\Http\Controllers\HomeController::class, 'viewReport'])->name('view-report')->middleware('role:Super,Admin,User');
Route::get('/view-reportpdf/{id}/', [App\Http\Controllers\HomeController::class, 'viewReportpdf'])->name('view-reportpdf')->middleware('role:Super');
Route::get('/edit-report/{id}/', [App\Http\Controllers\HomeController::class, 'editReport'])->name('edit-report')->middleware('role:Super,Admin,User');
Route::post('/reportissues', [App\Http\Controllers\HomeController::class, 'newAggreportIssue'])->name('reportissues')->middleware('role:Super,Admin,User');
Route::get('/agrissues/{id}', [App\Http\Controllers\HomeController::class, 'viewAgrIssues'])->name('agrissues')->middleware('role:Super,Admin,User');
Route::post('/saveqi', [App\Http\Controllers\HomeController::class, 'addQI'])->name('saveqi')->middleware('role:Super,Admin,User');
Route::post('/saveqicomment', [App\Http\Controllers\HomeController::class, 'addQIComment'])->name('saveqicomment')->middleware('role:Super,Admin,User');
Route::get('/delissue/{iid}/', [App\Http\Controllers\HomeController::class, 'delissue'])->name('delissue')->middleware('role:Super');



Route::get('/new-user', [App\Http\Controllers\HomeController::class, 'newUser'])->name('new-user')->middleware('role:Super,Admin');

Route::get('/edit-user/{id}/', [App\Http\Controllers\HomeController::class, 'editUser'])->name('edit-user')->middleware('role:Super,Admin');
Route::post('/addnew-user', [App\Http\Controllers\HomeController::class, 'create'])->name('addnew-user')->middleware('role:Super,Admin');

Route::get('/delete-user/{id}/', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('delete-user')->middleware('role:Super');
Route::post('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings')->middleware('role:Super');
Route::post('/searchmembers', [App\Http\Controllers\HomeController::class, 'membersSearch'])->name('searchmembers')->middleware('role:Worker,Admin,Finance,Super');

// TASKS / TO DOs
Route::post('/newtask', [App\Http\Controllers\TasksController::class, 'store'])->name('newtask')->middleware('role:Worker,Admin,Super');
Route::post('/newfollowup', [App\Http\Controllers\TasksController::class, 'newfollowup'])->name('newfollowup')->middleware('role:Worker,Admin,Super');
Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks')->middleware('role:Worker,Admin,Super');
Route::get('/completetask/{id}/', [App\Http\Controllers\TasksController::class, 'completetask'])->name('completetask')->middleware('role:Worker,Admin,Super');
Route::get('/inprogresstask/{id}/', [App\Http\Controllers\TasksController::class, 'inprogresstask'])->name('inprogresstask')->middleware('role:Worker,Admin,Super');
Route::get('/delete-task/{id}/', [App\Http\Controllers\TasksController::class, 'destroy'])->name('destroy')->middleware('role:Super');
Route::get('/delete-followup/{id}/', [App\Http\Controllers\TasksController::class, 'deletefollowup'])->name('delete-followup')->middleware('role:Worker,Admin,Super');

// COMMUNICATION
Route::get('/communications', [App\Http\Controllers\HomeController::class, 'communications'])->name('communications')->middleware('role:Admin,Super,Pastor');
Route::post('/sendsms', [App\Http\Controllers\HomeController::class, 'sendSMS'])->name('sendsms')->middleware('role:Admin,Super,Pastor');
Route::get('/sentmessages', [App\Http\Controllers\HomeController::class, 'sentSMS'])->name('sentmessages')->middleware('role:Admin,Super,Pastor');

// HELP AND SECURITY
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
Route::get('/security', [App\Http\Controllers\HomeController::class, 'security'])->name('security');


Route::get('users', function(){
    return View('users');
})->name('users')->middleware('role:Super,Admin');

// ARTISAN COMMANDS
Route::get('/artisan1/{command}', [App\Http\Controllers\HomeController::class, 'Artisan1']);
Route::get('/artisan2/{command}/{param}', [App\Http\Controllers\HomeController::class, 'Artisan2']);
