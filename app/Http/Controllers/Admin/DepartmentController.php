<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    public $departmentService;
    public function __construct(
        DepartmentService $departmentService
    ) {
        $this->departmentService = $departmentService;
    }

    public function index(){
        $department = Department::get();
        return view('admin.department.index', compact('department'));
    }

    public function addDepartment(){
        return view('admin.department.addDepartment');
    }

    public function GetUpdateDepartment($id){
        $department = $this->departmentService->getListDataDepartment($id);
        return view('admin.department.addDepartment', compact('department'));
    }

    public function updateDepartment(Request $request){
        $update = $this->departmentService->updateDepartment($request);
        return response()->json([
            'update' => $update,
            'status' => 200,
        ]);
    }

    public function add(Request $request){
        if($request->file('file')) {
            $request->file('file')->store('public/department');
            $department = $request->file('file')->hashName();
        }
        $data = Department::create([
            'department_name' => $request->department,
            'description' => $request->description,
            'image' => $department
        ]);
        return response()->json([
            'data' => $data,
            'status' => 200,
        ]);
    }

    public function getDataDepartment($id){
        $getDataDepartment = $this->departmentService->getDataDepartment($id);
        return response()->json($getDataDepartment);
    }

    public function deleteDepartment($id){
        $deleteDepartment = $this->departmentService->deleteDepartment($id);
        return response()->json(['deleteDepartment' => $deleteDepartment, 'status' => 200, 'success' => true]);
    }
}
