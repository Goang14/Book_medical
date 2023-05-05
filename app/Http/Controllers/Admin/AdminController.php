<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Show the Admin Login Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countDoctor = User::where('role', 2)->get()->count();
        $countPatient = User::where('role', 1)->get()->count();

        return view('admin.dashboard.index', compact('countDoctor', 'countPatient'));
    }
}
