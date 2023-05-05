<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'/doctor', 'middleware' => 'author.doctor'], function () {
    Route::get('/home', [App\Http\Controllers\Doctor\DoctorPageController::class, 'index'])->name('doctor.home');
    Route::get('/information_doctor/{id}', [App\Http\Controllers\Doctor\DoctorPageController::class, 'getDataPageDoctor'])->name('doctor.getdata');
    Route::get('/schedule_doctor', [App\Http\Controllers\Doctor\DoctorPageController::class, 'getScheduleDoctor'])->name('doctor.schedule_doctor');

    Route::get('/manager_patient', [App\Http\Controllers\Doctor\PatientController::class, 'index'])->name('doctor.manager_patient');
    Route::post('/update_patient', [App\Http\Controllers\Doctor\PatientController::class, 'updatePatient'])->name('doctor.update_patient');


});
