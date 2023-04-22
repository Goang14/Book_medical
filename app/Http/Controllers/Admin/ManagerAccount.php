<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ManagerAccount extends Controller
{
    public function index(){
        $dataUser = Auth::user()->get();
        return view('admin.listuser.index', compact('dataUser'));
    }
}
