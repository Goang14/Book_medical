<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\OncallSchedule;
use App\Services\OncallScheduleService;


class OncallScheduleController extends Controller
{

    public $oncallScheduleService;
    public function __construct(
        OncallScheduleService $oncallScheduleService
    ) {
        $this->oncallScheduleService = $oncallScheduleService;
    }

    public function index(){
        $dataOncallSchedule = DB::table('call_schedule')
        ->join('users', 'users.id', 'call_schedule.user_id')
        ->join('department', 'department.id', 'call_schedule.department_id')
        ->select('users.name', 'call_schedule.*')
        ->get();
        // dd($dataOncallSchedule);
        return view('admin.on-call_schedule.index', compact('dataOncallSchedule'));
    }

    public function getAddOncallSchedule(){
        $data = DB::table('doctor')->join('users', 'users.id', 'doctor.user_id')->select('doctor.id', 'users.name', 'doctor.user_id')->get();
        return view('admin.on-call_schedule.add_on_call_schedule', compact('data'));
    }

    public function addOncallSchedule(Request $request){
        $createOncallShedule = OncallSchedule::create([
            'session' => $request->session,
            'onAll_day' => $request->on_call_day,
            'user_id' => $request->doctor,
            'department_id' => $request->department,
        ]);
        return response()->json([
            'userDoctor' => $createOncallShedule,
            'status' => 200,
        ]);
    }

    public function getDataDepartmentDoctor($id){
        $getDataDepartmentDoctor = $this->oncallScheduleService->getDataDepartmentDoctor($id);
        return response()->json($getDataDepartmentDoctor);
    }
}
