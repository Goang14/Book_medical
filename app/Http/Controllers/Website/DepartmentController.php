<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use Illuminate\Http\Request;
use App\Models\Department;


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
}
