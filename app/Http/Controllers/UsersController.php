<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserService;


class UsersController extends Controller
{
    public $userService;
    public function __construct(
        UserService $userService,
    ) {
        $this->userService = $userService;
    }

    public function index(){
        $dataUser = $this->userService->getDataUser(Auth::user()->id);
        return view('website.information', compact('dataUser'));
    }

    public function updateInformation(Request $request){
        $updateInfo = $this->userService->updateInformation($request);
        return response()->json(['data' => $updateInfo]);
    }

    protected function authenticated(Request $request)
    {
        $path = $this->userService->checkAuthenticated();
        return redirect($path);
    }
}
