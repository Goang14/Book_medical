<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OncallScheduleService;


class OncallScheduleController extends Controller
{
    protected $oncallScheduleService;
    public function __construct(OncallScheduleService $oncallScheduleService)
    {
        $this->oncallScheduleService = $oncallScheduleService;
    }

    public function getData($id){
        $dataOncall = $this->oncallScheduleService->getDataOnCall($id);
        $dayOnCall = $dataOncall[0];
        $oncall = $dataOncall[1];
        $c = $dataOncall[2];
        return view('website.oncallSchedule', compact('dayOnCall', 'oncall', 'c'));
    }

    public function ngaytruc($ngay){
        $bacsi = DB::table('users')->Join('call_schedule', 'users.id', '=', 'call_schedule.user_id')
        ->where('call_schedule.onAll_day', $ngay)->get();
        echo $bacsi;
    }

    public function selectTime(){
        $count1= DB::table('examination_schedule')->where('appointment_time',"07:00:00")->count();
        $count2= DB::table('examination_schedule')->where('appointment_time',"08:00:00")->count();
        $count3= DB::table('examination_schedule')->where('appointment_time',"09:00:00")->count();
        $count4= DB::table('examination_schedule')->where('appointment_time',"10:00:00")->count();
        $count5= DB::table('examination_schedule')->where('appointment_time',"13:30:00")->count();
        $count6= DB::table('examination_schedule')->where('appointment_time',"14:30:00")->count();
        $count7= DB::table('examination_schedule')->where('appointment_time',"15:30:00")->count();
        $data["ca1"]=$count1;
        $data["ca2"]=$count2;
        $data["ca3"]=$count3;
        $data["ca4"]=$count4;
        $data["ca5"]=$count5;
        $data["ca6"]=$count6;
        $data["ca7"]=$count7;
        $a[]=$data;
        $jsonData = json_encode($a);
        return response()->json($jsonData);
    }
}
