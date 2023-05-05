<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\OncallSchedule;


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
            $departmentDoctorData = DB::table('department')
                ->join('doctor','department.id', 'doctor.department_id')
                ->where('doctor.user_id', $id)
                ->get();
            return $departmentDoctorData;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function getDataOnCall($id, $request){
        try {
            $id_department = $request->input('value');
            $today = date('Y-m-j', time());
            $dataOnCall = OncallSchedule::
                join('users', 'users.id', '=', 'call_schedule.user_id')
                ->join('doctor', 'users.id', '=', 'doctor.user_id')
                ->join('room', 'room.id', '=', 'doctor.room_id')
                ->join('department', 'department.id', '=', 'call_schedule.department_id')
                ->join('degree', 'degree.id', '=', 'doctor.degree_id')
                ->select('degree.name as name_degree', 'users.*', 'department.department_name', 'room.name_room')
                ->where('users.id', $id)
                ->first();
            $oncall = DB::table('call_schedule')
            ->join('users', 'users.id', 'call_schedule.user_id')
            ->join('doctor', 'users.id', 'doctor.user_id')
            ->join('department', 'department.id', 'call_schedule.department_id')
            ->where('users.id', $id)
            ->where('onAll_day', '>', $today)
            ->get();

            $c = DB::table('call_schedule')->where('onAll_day','>',$today);

            return [$dataOnCall, $oncall ,$c];
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
