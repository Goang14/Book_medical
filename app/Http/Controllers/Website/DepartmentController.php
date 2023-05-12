<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



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
        $now = Carbon::now();
        $listData = Department::join('doctor', 'doctor.department_id', 'department.id')
        ->join('users', 'doctor.user_id', 'users.id')
        ->join('degree', 'doctor.degree_id', 'degree.id')
        ->select('degree.name as name_degree', 'users.*','department.department_name', 'doctor.id as id_doctor','doctor.image', 'doctor.department_id')
        ->where('doctor.department_id', $id)
        ->get();
        return view('website.detail_department', compact('listData'));
    }

    public function searchDoctor(Request $request){
        $name = $request->input('query');
        $id = $request->input('value');
        $searchResults = DB::table('department')
            ->join('doctor', 'doctor.department_id', '=', 'department.id')
            ->join('users', 'doctor.user_id', '=', 'users.id')
            ->join('degree', 'doctor.degree_id', 'degree.id')
            ->select('degree.name as name_degree', 'users.*','department.department_name', 'doctor.id as id_doctor','doctor.image', 'doctor.department_id')
            ->where('department.id', '=', $id)
            ->Where('users.name', 'like', '%' . $name . '%')
            ->get();
        $listData = Department::join('doctor', 'doctor.department_id', 'department.id')
            ->join('users', 'doctor.user_id', 'users.id')
            ->join('degree', 'doctor.degree_id', 'degree.id')
            ->select('degree.name as name_degree', 'users.*','department.department_name', 'doctor.id as id_doctor','doctor.image', 'doctor.department_id')
            ->where('doctor.department_id', $id)
            ->get();
        if (collect($searchResults)->isEmpty()) {
            $searchResults = collect();
        }
        return view('website.detail_department', compact('searchResults', 'listData'));
    }

}
