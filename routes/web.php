<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
require_once('admin.php');
require_once('doctor.php');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'author.user'], function() {
    Route::get('/services', [App\Http\Controllers\Website\ServiceController::class, 'index'])->name('services');
    Route::get('/departments', [App\Http\Controllers\Website\DepartmentController::class, 'index'])->name('departments');
    Route::get('/book_appoinment', [App\Http\Controllers\Website\BookApoinmentController::class, 'index'])->name('book_appoinment');
    Route::get('/contact', [App\Http\Controllers\Website\ContactController::class, 'index'])->name('contact');
    Route::get('/booking_schedule', [App\Http\Controllers\Website\BookingScheduleController::class, 'index'])->name('booking_schedule');
    Route::get('/doctor', [App\Http\Controllers\Website\DoctorController::class, 'index'])->name('doctor');
    Route::get('/procedure', [App\Http\Controllers\Website\ProcedureController::class, 'index'])->name('procedure');
    Route::get('/information', [App\Http\Controllers\UsersController::class, 'index'])->name('information');
    Route::post('/update_information', [App\Http\Controllers\UsersController::class, 'updateInformation'])->name('update_information');
    Route::post('/addBookApointment', [App\Http\Controllers\Website\BookApoinmentController::class, 'addBookApointment'])->name('addBookApointment');
    Route::post('/delete/{id}', [App\Http\Controllers\Website\BookingScheduleController::class, 'delete'])->name('delete');
});





