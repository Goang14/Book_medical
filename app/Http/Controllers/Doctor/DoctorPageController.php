<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\DoctorService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class DoctorPageController extends Controller
{

    public $doctorService;

    public function __construct(
        DoctorService $doctorService
    ) {
        $this->doctorService = $doctorService;
    }
    public function index(){
        return view('doctor.index');
    }

    public function getDataPageDoctor($id){
        $dataDoctor = $this->doctorService->getDataPageDoctor($id);
        return view('doctor.information_doctor', compact('dataDoctor'));
    }

    public function getScheduleDoctor(){
        $schedule = DB::table('call_schedule')->join('users', 'users.id', 'call_schedule.user_id')
        ->join('doctor', 'users.id', 'doctor.user_id')
        ->join('room', 'room.id', 'doctor.room_id')
        ->join('degree', 'degree.id', 'doctor.degree_id')
        ->select('users.name as name_user','room.*', 'doctor.*', 'degree.*', 'call_schedule.*' )
        ->where('call_schedule.user_id', Auth::user()->id)->get();
        return view('doctor.schedule_doctor')->with('schedule', $schedule);
    }

}
