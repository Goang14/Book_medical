<?php
namespace App\Services;

use App\Models\User;
use App\Models\ExaminationSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookAppointmentService{
    public function createApoinment($request){
        try {
            $count = ExaminationSchedule::where('department_id', $request->department)->get()->count();
            if($count >= 6){
                error_log('Số lượng lịch khám vượt quá giới hạn');
            }else{
                $createAppointment = ExaminationSchedule::create([
                    'user_id' => Auth::user()->id,
                    'department_id' => $request->department,
                    'doctor_name' => $request->doctor,
                    'name_patient' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'sex' => $request->gender,
                    'address' => $request->address,
                    'appointment_date' => $request->appointment_date,
                    'appointment_time' => $request->appointment_time,
                    'note' => $request->note,
                    'status' => $request->status,
                ]);
            }
            return $createAppointment;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteAppointment($id){
        try {
            $dataID = DB::table('examination_schedule')->where('examination_schedule.id', $id)->first();
            DB::table('examination_schedule')->where('examination_schedule.id', $dataID->id)->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getIdBookSchedule($id){
        $dataID = ExaminationSchedule::where('examination_schedule.id', $id)->get();
        return $dataID;
    }
}
