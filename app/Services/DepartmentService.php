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
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getListDataDepartment($id){
        try {
            $department = Department::where('id', $id)->first();
            return $department;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function getDataDepartment($id){
        try {
            $dataRoom = Room::join('department', 'room.department_id', 'department.id')
            ->select('department.id', 'room.id as id_room','room.name_room','department.department_name')
            ->where('department.id', $id)->get();
            return $dataRoom;
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteDepartment($id){
        DB::beginTransaction();
        try {
            DB::table('department')->where('id', $id)->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
