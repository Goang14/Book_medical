<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Department;

class OncallScheduleService{
    public function addOncallSchedule($request)
    {
        try {
            $createOncall = Room::create([
                'department_id' => $request->department,
                'session' => $request->session,
                'onAll_day' => $request->onAll_day,
                'doctor_id' => $request->doctor_id,
                'user_id' => $request->user_id,
            ]);
            return $createOncall;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getDataDepartmentDoctor($id){
        try {
            $dataRoom = Department::join('doctor', 'doctor.department_id', 'department.id')->where('department.id', $id)->get();
            return $dataRoom;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
