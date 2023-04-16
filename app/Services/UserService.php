<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;



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
                return RouteServiceProvider::HOME;
            }
            return '/user/register';
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

}
