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
Route::group(['prefix'=>'/admin', 'middleware' => 'author.admin'], function () {
    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/department', [App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('admin.department');
    Route::get('/add_department', [App\Http\Controllers\Admin\DepartmentController::class, 'addDepartment'])->name('admin.add_department');
    Route::post('/add', [App\Http\Controllers\Admin\DepartmentController::class, 'add'])->name('admin.add');
    Route::get('/update_department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'GetUpdateDepartment'])->name('admin.update_department');
    Route::post('/update_department', [App\Http\Controllers\Admin\DepartmentController::class, 'updateDepartment'])->name('admin.department');

    Route::get('/doctor', [App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('admin.doctor');
    Route::get('/create-doctor', [App\Http\Controllers\Admin\DoctorController::class, 'formCreateDoctor'])->name('admin.doctor_create');
    Route::post('/create-doctor', [App\Http\Controllers\Admin\DoctorController::class, 'createDoctor'])->name('admin.create_doctor');
    Route::get('/getDepartment/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'getDataDepartment'])->name('admin.get_department');
    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'deleteUserAndDoctor'])->name('admin.delete_doctor');
    Route::get('/update_doctor/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'updateDoctor'])->name('admin.update_doctor');

});
