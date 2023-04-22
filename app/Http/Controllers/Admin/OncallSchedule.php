<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Services\OncallScheduleService;


class OncallSchedule extends Controller
{

    public $oncallScheduleService;
    public function __construct(
        OncallScheduleService $oncallScheduleService
    ) {
        $this->oncallScheduleService = $oncallScheduleService;
    }

    public function index(){
        $dataOncallSchedule = DB::table('call_schedule')
        ->join('doctor', 'doctor.id', 'call_schedule.doctor_id')
        ->join('department', 'department.id', 'call_schedule.department_id')
        ->join('users', 'users.id', 'doctor.user_id')
        ->get();
        return view('admin.on-call_schedule.index', compact('dataOncallSchedule'));
    }

    public function getAddOncallSchedule(){
        $data = DB::table('doctor')->join('users', 'users.id', 'doctor.user_id')->get();
        $dataDepartment = Department::get();
        return view('admin.on-call_schedule.add_on_call_schedule', compact('data', 'dataDepartment'));
    }

    public function addOncallSchedule(){
        $createOncallShedule = DB::table('call_schedule')->create($request->all);
        return response()->json([
            'userDoctor' => $createOncallShedule,
            'status' => 200,
        ]);
    }

    public function getDataDepartmentDoctor($id){
        $getDataDepartmentDoctor = $this->departmentService->getDataDepartmentDoctor($id);
        dd($getDataDepartmentDoctor);
        return response()->json($getDataDepartmentDoctor);
    }


}
