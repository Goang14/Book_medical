<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Room;
use Illuminate\Support\Facades\DB;


class DepartmentService{
    public function updateDepartment($request){
        try {
            if($request->file('file')) {
                $request->file('file')->store('public/department');
                $department = $request->file('file')->hashName();
            }

            $data = Department::where('id', $request->id_department)->update([
                'department_name' => $request->department,
                'description' => $request->description,
                'image' => $department,
            ]);
           return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDataDepartment($id){
        try {
            $dataRoom = Room::join('department', 'room.department_id', 'department.id')->where('department.id', $id)->get();
            return $dataRoom;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
