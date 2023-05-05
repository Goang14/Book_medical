<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Services\DoctorService;
use App\Services\DepartmentService;



class DoctorController extends Controller
{
    public $doctorService;
    public $departmentService;

    public function __construct(
        DoctorService $doctorService, DepartmentService $departmentService
    ) {
        $this->doctorService = $doctorService;
        $this->departmentService = $departmentService;

    }

    public function index(){
        $dataDoctor = $this->doctorService->getDataDoctor();
        return view('admin.doctor.index', compact('dataDoctor'));
    }

    public function formCreateDoctor(){
        $data = $this->doctorService->getData();
        $dataDegree =$data[0];
        $dataDepartment =$data[1];
        return view('admin.doctor.add_doctor', compact('dataDegree', 'dataDepartment'));
    }

    public function createDoctor(Request $request){
        $createDoctor = $this->doctorService->createDoctor($request);
        return response()->json([
            'userDoctor' => $createDoctor,
            'status' => 200,
        ]);
    }

    public function updateDoctor(Request $request){
        $dataDoctor = $this->doctorService->getDataDoctorUpdate();
        $data = $this->doctorService->getData();
        $dataDegree =$data[0];
        $dataDepartment =$data[1];
        return view('admin.doctor.add_doctor', compact('dataDegree', 'dataDepartment', 'dataDoctor'));
    }

    public function deleteUserAndDoctor($id){
        $deleteDoctor = $this->doctorService->deleteUserAndDoctor($id);
        return response()->json(['deleteDoctor' => $deleteDoctor,  'status' => 200, 'success' => true]);
    }
}
