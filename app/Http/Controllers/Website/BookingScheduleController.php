<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExaminationSchedule;
use App\Services\UserService;
use App\Services\BookAppointmentService;
use Illuminate\Support\Facades\Auth;


class BookingScheduleController extends Controller
{
    public $userService;
    public $bookApointmentService;
    public function __construct(
        UserService $userService, BookAppointmentService $bookAppointmentService
    ) {
        $this->userService = $userService;
        $this->bookAppointmentService = $bookAppointmentService;
    }

    public function index(){
        $data = ExaminationSchedule::where('user_id', Auth::user()->id)
        ->select('examination_schedule.*')->get();
        // dd($data);
        return view('website.booking_schedule', compact('data'));
    }

    public function delete($id)
    {
        $this->bookAppointmentService->deleteAppointment($id);
        return response()->json(['success' => 'delete successfully.', 'status' => 200]);
    }
}
