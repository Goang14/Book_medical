<?php
namespace App\Services;

use App\Models\User;
use App\Models\ExaminationSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookApoinmentService{
    public function createApoinment($request){
        try {
            $createApoinment = ExaminationSchedule::create([
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
            return $createApoinment;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteApoinment($id){
        try {
            $dataID = DB::table('examination_schedule')->where('examination_schedule.id', $id)->first();
            DB::table('examination_schedule')->where('examination_schedule.id', $dataID->id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getIdBookSchedule($id){
        $dataID = ExaminationSchedule::where('examination_schedule.id', $id)->get();
        return $dataID;
    }
}
