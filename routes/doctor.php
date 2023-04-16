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
});
