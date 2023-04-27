<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Redirect;



class ManagerAccount extends Controller
{
    public function index(){
        $dataUser = Auth::user()->get();
        return view('admin.listuser.index', compact('dataUser'));
    }

    public function block($id){
        $user = User::where('id',$id)->first();
        if($user->status == 1) {
            $result = User::where('id', $id)->update([
                 'status' => 0,
            ]);
            return Redirect::route('admin.account');
        }else {
            $result = User::where('id', $id)->update(['status' => 1,]);
            return Redirect::route('admin.account');
        }
    }
}
