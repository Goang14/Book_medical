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

    public function getData($id, Request $request){
        $dataOncall = $this->oncallScheduleService->getDataOnCall($id, $request);
        $dayOnCall = $dataOncall[0];
        $oncall = $dataOncall[1];
        $c = $dataOncall[2];
        return view('website.oncallSchedule', compact('dayOnCall','oncall', 'c'));
    }
}
