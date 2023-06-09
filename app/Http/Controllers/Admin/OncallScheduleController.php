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
        return view('admin.on-call_schedule.index', compact('dataOncallSchedule'));
    }

    public function getAddOncallSchedule(){
        $data = DB::table('doctor')->join('users', 'users.id', 'doctor.user_id')->select('doctor.id', 'users.name', 'doctor.user_id')->get();
        return view('admin.on-call_schedule.add_on_call_schedule', compact('data'));
    }

    public function addOncallSchedule(Request $request){
        $createOncallSchedule = OncallSchedule::create([
            'session' => $request->session,
            'onAll_day' => $request->on_call_day,
            'user_id' => $request->doctor,
            'department_id' => $request->department,
        ]);
        return response()->json([
            'userDoctor' => $createOncallSchedule,
            'status' => 200,
        ]);
    }

    public function getDataDepartmentDoctor($id){
        $getDataDepartmentDoctor = $this->oncallScheduleService->getDataDepartmentDoctor($id);
        return response()->json($getDataDepartmentDoctor);
    }

    public function getDataUpdate($id){
        $dataOncall = DB::table('call_Schedule')
        ->join('users', 'users.id', 'call_Schedule.user_id')
        ->join('department', 'department.id', 'call_Schedule.department_id')
        ->select('call_Schedule.id as id_call_Schedule', 'call_Schedule.user_id', 'call_Schedule.onAll_day','call_Schedule.session')
        ->where('call_Schedule.id', $id)
        ->first();
        $data = DB::table('doctor')->join('users', 'users.id', 'doctor.user_id')->select('doctor.id', 'users.name', 'doctor.user_id')->get();
        return view('admin.on-call_schedule.add_on_call_schedule', compact('data', 'dataOncall'));
    }


    public function updateOncall(Request $request){
        $updateOncallShedule = OncallSchedule::where('id', $request->id)->update([
            'session' => $request->session,
            'onAll_day' => $request->on_call_day,
            'user_id' => $request->doctor,
            'department_id' => $request->department,
        ]);
        return response()->json([
            'updateOncallShedule' => $updateOncallShedule,
            'status' => 200,
        ]);
    }

    public function deleteOncall($id){
        $deleteOncall = $this->oncallScheduleService->deleteOncall($id);
        return response()->json(['deleteOncall' => $deleteOncall, 'status' => 200, 'success' => true]);
    }
}
