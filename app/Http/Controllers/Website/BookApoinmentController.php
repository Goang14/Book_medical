<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use App\Services\UserService;
use App\Services\BookAppointmentService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BookApoinmentController extends Controller
{

    public $userService;
    public $bookAppointmentService;
    public function __construct(
        UserService $userService, BookAppointmentService $bookAppointmentService
    ) {
        $this->userService = $userService;
        $this->bookAppointmentService = $bookAppointmentService;
    }

    public function index(){
        $dataDepartment = Department::select('*')->get();
        $dataDoctor = Doctor::join('users', 'doctor.user_id', 'users.id')
        ->select('*')->where('role', 2)->get();
        $dataUser = $this->userService->getDataUser(Auth::user()->id);
        $dataPatient = User::where('id', Auth::user()->id)->first();
        return view('website.book_apoinment', compact('dataDepartment', 'dataDoctor', 'dataUser', 'dataPatient'));
    }

    public function addBookAppointment(Request $request){
        $addBookAppointment = $this->bookAppointmentService->createApoinment($request);
        return response()->json(['addBookAppointment' => $addBookAppointment, 'status' => 200]);
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
