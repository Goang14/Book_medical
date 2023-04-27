<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Enums\UserRole;

class UserService
{
    public function getDataUser($id){
        $dataUser = User::find($id);
        return $dataUser;
    }

    public function updateInformation($request){
        try {
            $updateInfo = User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'birth_day' => $request->birth_day,
                'sex' => $request->sex,
            ]);
            return $updateInfo;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkAuthenticated()
    {
        try {
            $user = Auth::user();
            if ($user->role == UserRole::ADMIN) {
                return RouteServiceProvider::ADMIN_HOME;
            }

            if($user->role == UserRole::USER){
                if($user->status == 0){
                    abort(403, 'Tài Khoản Của Bạn Đã Bị Khóa Xin Mời Liên Hệ Lại ADMIN');
                }else{
                    return RouteServiceProvider::HOME;
                }
            }

            if($user->role == UserRole::DOCTOR){
                return RouteServiceProvider::DOCTOR;
            }
            return '/register';
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

}
