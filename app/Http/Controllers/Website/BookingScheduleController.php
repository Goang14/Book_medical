<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExaminationSchedule;
use App\Services\UserService;
use App\Services\BookApoinmentService;
use Illuminate\Support\Facades\Auth;


class BookingScheduleController extends Controller
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
        $data = ExaminationSchedule::join('department', 'department.id', 'examination_schedule.department_id')
        ->where('user_id', Auth::user()->id)->get();
        return view('website.booking_schedule', compact('data'));
    }

    public function delete($id)
    {
        $this->bookApointmentService->deleteApoinment($id);
        return response()->json(['success' => 'delete successfully.', 'status' => 200]);
    }
}
