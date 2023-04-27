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

    public function getDataOnCall($id){
        try {
            $dataOnCall = OncallSchedule::join('users', 'users.id', 'call_schedule.user_id')
            ->join('doctor', 'users.id', 'doctor.user_id')
            ->join('room', 'room.id', 'doctor.room_id')
            ->join('department', 'department.id', 'call_schedule.department_id')
            ->join('degree', 'degree.id', 'doctor.degree_id')
            ->select('degree.name as name_degree', 'users.*', 'department.department_name', 'room.*', 'doctor.*')
            ->where('doctor.id', $id)
            ->get();
            $today = date('Y-m-j', time());
            $oncall = DB::table('call_schedule')
            ->where('onAll_day','>=',$today)
            // ->where('user_id', $id)
            ->get();

            $c = DB::table('call_schedule')->where('onAll_day','>',$today)->count();
            // dd($c);

            return [$dataOnCall, $oncall, $c];
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }


    public function selectTime() {
        $count1= DB::table('examination_schedule')->where('appointment_time',"07:00:00")->count();
        $count2= DB::table('examination_schedule')->where('appointment_time',"08:00:00")->count();
        $count3= DB::table('examination_schedule')->where('appointment_time',"09:00:00")->count();
        $count4= DB::table('examination_schedule')->where('appointment_time',"10:00:00")->count();
        $count5= DB::table('examination_schedule')->where('appointment_time',"13:30:00")->count();
        $count6= DB::table('examination_schedule')->where('appointment_time',"14:30:00")->count();
        $count7= DB::table('examination_schedule')->where('appointment_time',"15:30:00")->count();
        $data["ca1"]=$count1;
        $data["ca2"]=$count2;
        $data["ca3"]=$count3;
        $data["ca4"]=$count4;
        $data["ca5"]=$count5;
        $data["ca6"]=$count6;
        $data["ca7"]=$count7;
        $a[]=$data;
        $jsonData = json_encode($a);
        return response()->json($jsonData);
    }

}
