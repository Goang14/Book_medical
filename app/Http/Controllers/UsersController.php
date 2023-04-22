<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

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
    public function showChangePasswordForm()
    {
        return view('website.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $currentPassword = $user->password;

        if (Hash::check($request->input('current_password'), $currentPassword)) {
            $user->fill([
                'password' => Hash::make($request->input('new_password')),
            ])->save();

            return redirect()->route('home')->with('success', 'Password changed successfully!');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Wrong password.']);
        }
    }

}
