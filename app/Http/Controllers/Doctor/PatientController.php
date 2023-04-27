<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExaminationSchedule;


class PatientController extends Controller
{
    public function __construct() {

    }

    public function index(){
        $dataPatient = ExaminationSchedule::join('users', 'examination_schedule.user_id',  'users.id')
        ->where('examination_schedule.user_id', Auth::user()->id)
        ->select('examination_schedule.id as schedule_id', 'examination_schedule.name_patient', 'examination_schedule.sex', 'users.phone',
        'users.birth_day', 'examination_schedule.appointment_date', 'examination_schedule.appointment_time', 'examination_schedule.status')->get();
        // $data = ExaminationSchedule::join('users', 'examination_schedule.user_id',  'users.id')->where('id', $id)->first();
        return view('doctor.manager_patient', compact('dataPatient'));
    }

    public function updatePatient(Request $request){
        $updateData = ExaminationSchedule::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        return response()->json(['updateData' => $updateData, 'status' => 200, 'success' => true]);
    }
}
