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

    Route::get('/account', [App\Http\Controllers\Admin\ManagerAccount::class, 'index'])->name('admin.account');
    Route::get('/block/{id}', [App\Http\Controllers\Admin\ManagerAccount::class, 'block'])->name('admin.block');
    Route::get('/block_acc', [App\Http\Controllers\Auth\LoginController::class, 'block'])->name('admin.block_acc');

    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/department', [App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('admin.department');
    Route::get('/add_department', [App\Http\Controllers\Admin\DepartmentController::class, 'addDepartment'])->name('admin.add_department');
    Route::post('/add', [App\Http\Controllers\Admin\DepartmentController::class, 'add'])->name('admin.add');

    Route::get('/update_department/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'GetUpdateDepartment'])->name('admin.update_department');
    Route::post('/update_department', [App\Http\Controllers\Admin\DepartmentController::class, 'updateDepartment'])->name('admin.department');
    Route::get('/getDepartment/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'getDataDepartment'])->name('admin.get_department');
    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'deleteDepartment'])->name('admin.delete_department');


    Route::get('/doctor', [App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('admin.doctor');
    Route::get('/create-doctor', [App\Http\Controllers\Admin\DoctorController::class, 'formCreateDoctor'])->name('admin.doctor_create');
    Route::post('/create-doctor', [App\Http\Controllers\Admin\DoctorController::class, 'createDoctor'])->name('admin.create_doctor');
    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'deleteUserAndDoctor'])->name('admin.delete_doctor');
    Route::get('/update_doctor/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'updateDoctor'])->name('admin.update_doctor');

    Route::get('/room', [App\Http\Controllers\Admin\RoomController::class, 'index'])->name('admin.room');
    Route::get('/add_room', [App\Http\Controllers\Admin\RoomController::class, 'getAddRoom'])->name('admin.get_add_room');
    Route::post('/add_room', [App\Http\Controllers\Admin\RoomController::class, 'addRoom'])->name('admin.add_room');

    Route::get('/update_room/{id}', [App\Http\Controllers\Admin\RoomController::class, 'getUpdateRoom'])->name('admin.get_update_room');
    Route::post('/update_room', [App\Http\Controllers\Admin\RoomController::class, 'updateRoom'])->name('admin.update_room');
    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\RoomController::class, 'deleteRoom'])->name('admin.delete_room');

    Route::get('/patient', [App\Http\Controllers\Admin\PatientController::class, 'index'])->name('admin.patient');

    Route::get('/on_call_schedule', [App\Http\Controllers\Admin\OncallScheduleController::class, 'index'])->name('admin.on_call_schedule');
    Route::get('/add_on_call_schedule', [App\Http\Controllers\Admin\OncallScheduleController::class, 'getAddOncallSchedule'])->name('admin.add_on_call_schedule');
    Route::post('/create-oncall-schedule', [App\Http\Controllers\Admin\OncallScheduleController::class, 'addOncallSchedule'])->name('admin.create-oncall-schedule');
    Route::get('/getDataDepartmentDoctor/{id}', [App\Http\Controllers\Admin\OncallScheduleController::class, 'getDataDepartmentDoctor'])->name('admin.getDataDepartment');

    Route::get('/getDataUpdate/{id}', [App\Http\Controllers\Admin\OncallScheduleController::class, 'getDataUpdate'])->name('admin.getDataUpdate');
    Route::post('/update-oncall-schedule/{id}', [App\Http\Controllers\Admin\OncallScheduleController::class, 'updateOncall'])->name('admin.update');
    Route::delete('/deleteOncall/{id}', [App\Http\Controllers\Admin\OncallScheduleController::class, 'deleteOncall'])->name('admin.deleteOncall');

});
