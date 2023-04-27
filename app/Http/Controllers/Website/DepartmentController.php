<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;

class DepartmentController extends Controller
{
    public $depatmentService;

    public function __construct(DepartmentService $depatmentService)
    {
        $this->depatmentService = $depatmentService;
    }

    public function index(){
        $dataDepartment = Department::get();
        // dd($dataDepartment);
        return view('website.departments', compact('dataDepartment'));
    }

    public function detailDepartment($id){
        $listData = Department::join('doctor', 'doctor.department_id', 'department.id')
        ->join('users', 'doctor.user_id', 'users.id')
        ->join('degree', 'doctor.degree_id', 'degree.id')
        ->select('degree.name as name_degree', 'users.*','department.*', 'doctor.id as id_doctor','doctor.image')
        ->where('department.id', $id)
        ->get();
        // $dataDoctor = Doctor::join('department', 'doctor.department_id', 'department.id')
        // ->join('users', 'users.id', 'doctor.user_id')->get();
        // dd($dataDoctor);
        return view('website.detail_department', compact('listData'));
    }
}
