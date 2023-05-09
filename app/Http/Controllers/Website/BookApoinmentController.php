<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use App\Services\UserService;
use App\Services\BookApoinmentService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


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
        $dataDoctor = Doctor::join('users', 'doctor.user_id', 'users.id')
        ->select('*')->where('role', 2)->get();
        $dataUser = $this->userService->getDataUser(Auth::user()->id);
        $dataPatient = User::where('id', Auth::user()->id)->first();
        return view('website.book_apoinment', compact('dataDepartment', 'dataDoctor', 'dataUser', 'dataPatient'));
    }

    public function addBookApointment(Request $request){
        $addBookApointment = $this->bookApointmentService->createApoinment($request);
        return response()->json(['addBookApointment' => $addBookApointment, 'status' => 200]);
    }

    public function departmentDoctor($id){
        $now = Carbon::now();
        $data = Doctor::join('department', 'doctor.department_id', 'department.id')
        ->join('users', 'doctor.user_id', 'users.id')
        ->join('call_schedule', 'users.id', 'call_schedule.user_id')
        ->where('call_schedule.onAll_day', '>=', $now->toDateString())
        ->where('doctor.user_id',$id)
        ->get();
        return response()->json($data);
    }
}
