<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ExaminationSchedule;

class PatientController extends Controller
{
    public function index(){
        $dataPatient = ExaminationSchedule::join('users', 'examination_schedule.user_id',  'users.id')->get();
        $data = ExaminationSchedule::join('users', 'examination_schedule.user_id',  'users.id')->first();
        return view('admin.patient.index', compact('dataPatient', 'data'));
    }
}
