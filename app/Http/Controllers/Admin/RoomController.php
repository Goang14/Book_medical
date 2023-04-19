<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\DepartmentService;
use App\Services\RoomService;


class RoomController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public  $roomService;

    public function __construct(
        RoomService $roomService
    ) {
        $this->roomService = $roomService;
    }

    public function index()
    {
        $dataRoom = DB::table('room')->join('department', 'department.id', 'room.department_id')->select('room.id as room_id', 'department.department_name', 'room.name_room' )->get();
        return view('admin.room.index', compact('dataRoom'));
    }

    public function getAddRoom(){
        $department = DB::table('department')->get();
        return view('admin.room.add_room', compact('department'));
    }

    public function addRoom(Request $request){
        $create = $this->roomService->addRoom($request);
        return response()->json(['create' => $create, 'status' => 200]);
    }

    public function getUpdateRoom($id){
        $data = $this->roomService->getDataUpdateRoom($id);
        $department = $data[0];
        $dataRoom = $data[1];
        return view('admin.room.add_room', compact('department', 'dataRoom'));
    }

    public function updateRoom(Request $request){
        $updateData = $this->roomService->updateRoom($request);
        return response()->json(['updateData' => $updateData, 'status' => 200]);
    }

    public function deleteRoom($id){
        $deleteRoom = $this->roomService->deleteRoom($id);
        return response()->json(['deleteRoom' => $deleteRoom, 'status' => 200, 'success' => true]);
    }
}
