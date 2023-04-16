<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorService{
    public function createDoctor($request){
        try {
            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'birth_day' => $request->birthDay,
                'address' => $request->address,
                'phone' => $request->phone,
                'role' => $request->role,
            ]);

            if($request->file('avatar')) {
                $request->file('avatar')->store('public/avatar');
                $avatar = $request->file('avatar')->hashName();
            }
            DB::table('doctor')->insert([
                'user_id' => $userId,
                'department_id' => $request->department,
                'room_id' => $request->room,
                'degree_id' => $request->degree,
                'image' => $avatar,
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getData(){
        try {
            $dataDegree = DB::table('degree')->get();
            $dataDepartment = DB::table('department')->get();
            return [$dataDegree, $dataDepartment];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDataDoctor(){
        try {
            $dataDoctor = Doctor::join('department', 'doctor.department_id', 'department.id')
            ->join('users', 'doctor.user_id', 'users.id')
            ->join('room','doctor.room_id','room.id')
            ->join('degree','doctor.degree_id','degree.id')
            ->select('users.name as name_doctor','doctor.image', 'doctor.id as id_doctor', 'users.id as user_id', 'users.address', 'users.phone',
             'users.birth_day', 'department.department_name','room.name_room','degree.name as name_degree')
            ->get();
            return $dataDoctor;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getDataPageDoctor($id){
        try {
            $dataPageDoctor = Doctor::join('department', 'doctor.department_id', 'department.id')
            ->join('users', 'doctor.user_id', 'users.id')
            ->join('room','doctor.room_id','room.id')
            ->join('degree','doctor.degree_id','degree.id')
            ->select('users.name as name_doctor','doctor.image', 'doctor.id as id_doctor', 'users.id as user_id', 'users.address', 'users.phone',
             'users.birth_day', 'department.department_name','room.name_room','degree.name as name_degree')
            ->where('user_id', $id)->first();
            return $dataPageDoctor;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function getDataDoctorUpdate(){
        try {
            $dataDoctor = Doctor::join('department', 'doctor.department_id', 'department.id')
            ->join('users', 'doctor.user_id', 'users.id')
            ->join('room','doctor.room_id','room.id')
            ->join('degree','doctor.degree_id','degree.id')
            ->select('users.name as name_doctor', 'users.id as user_id', 'users.address', 'users.phone','users.email', 'users.birth_day', 'department.department_name', 'department.id as id_department', 'room.name_room','degree.name as name_degree', 'degree.id as id_degree')
            ->first();
            return $dataDoctor;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function deleteUserAndDoctor($id){
        $user = User::findOrFail($id);
        DB::beginTransaction();
        try {
            // Xóa bác sĩ trong bảng doctor trước
            DB::table('doctor')->where('user_id', $id)->delete();
            // Xóa người dùng trong bảng users
            $user->delete();
            DB::commit();
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'success' => false
            ]);
        }
    }
}
