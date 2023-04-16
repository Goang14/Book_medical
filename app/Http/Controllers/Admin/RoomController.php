<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataRoom()
    {
        return view('admin.dashboard.index');
    }
}
