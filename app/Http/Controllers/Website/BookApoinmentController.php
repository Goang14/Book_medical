<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Services\UserService;
use App\Services\BookApoinmentService;
use Illuminate\Support\Facades\Auth;


class BookApoinmentController extends Controller
{

    public $userService;
    public $bookApointmentService;
    public function __construct(
        UserService $userService, BookApoinmentService $bookApointmentService
    ) {
        $this->userService = $userService;
        $this->bookApointmentService = $bookApointmentService;
    }

    public function index(){
        $dataDepartment = Department::select('*')->get();
        $dataDoctor = Doctor::join('users', 'doctor.user_id', 'users.id')->select('*')->where('role', 2)->get();
        $dataUser = $this->userService->getDataUser(Auth::user()->id);
        return view('website.book_apoinment', compact('dataDepartment', 'dataDoctor', 'dataUser'));
    }

    public function addBookApointment(Request $request){
        $addBookApointment = $this->bookApointmentService->createApoinment($request);
        return response()->json(['addBookApointment' => $addBookApointment]);
    }
}
