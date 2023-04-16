<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DoctorService;


class DoctorPageController extends Controller
{

    public $doctorService;

    public function __construct(
        DoctorService $doctorService
    ) {
        $this->doctorService = $doctorService;
    }
    public function index(){
        return view('doctor.index');
    }

    public function getDataPageDoctor($id){
        $dataDoctor = $this->doctorService->getDataPageDoctor($id);
        return view('doctor.information_doctor', compact('dataDoctor'));
    }
}
