<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use Illuminate\Support\Facades\DB;


class RoomService{
    public function addRoom($request)
    {
        try {
            $addData = Room::create([
                'name_room' => $request->room_name,
                'department_id' => $request->department,
            ]);
            return $addData;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateRoom($request)
    {
        try {
            $updateData = Room::where('id', $request->id_room)->update([
                'name_room' => $request->room_name,
                'department_id' => $request->department,
            ]);
            return $updateData;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getDataUpdateRoom($id){
        try {
            $department = DB::table('department')->get();
            $dataRoom = DB::table('room')->where('id', $id)->first();
            return[$department, $dataRoom];
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    public function deleteRoom($id){
        DB::beginTransaction();
        try {
            DB::table('room')->where('id', $id)->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
