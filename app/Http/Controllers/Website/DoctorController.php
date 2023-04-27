<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
    public function index(){
        $doctor = DB::table('doctor')->join('users', 'users.id', 'doctor.user_id')
        ->join('department', 'department.id', 'doctor.department_id')
        ->select('doctor.*', 'department.department_name', 'users.*')
        ->get();
        // dd($doctor);
        return view('website.doctor', compact('doctor'));
    }
}
