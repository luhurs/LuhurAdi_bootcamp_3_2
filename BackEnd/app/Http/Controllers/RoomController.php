<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function getAllRoom(){
        $allRoom = Brand::get();
        return response()->json($allRoom, 200);
    }

    public function addRoom(Request $request){
        DB::beginTransaction();

        try{
            
            $this->validate($request, [
                'name' => 'required',
                'description'  => 'required',
                'price' => 'required',
                'status' => 'required'
            ]);

            $roomName = $request->input('name');
            $roomDesc = $request->input('description');
            $roomPrice = $request->input('price');
            $roomStatus = $request->input('status');
            
            $room = new room;
            $room->name = $roomName;
            $room->description = $roomDesc;
            $room->price = $roomPrice;
            $room->status = $roomStatus;
            $room->save();


            DB::commit();
            return response->json(["message" => "Add new room success"], 200);
        }
        catch(\Exception $e) {
            DB::rollback();
            return response()->json(["message" => $e->getMessage()])
        }
    }

    public function removeRoom(){
        DB::beginTransaction();

        try{
            $this->validate($request, [
                'id' => 'required'
            ]);

            $id = (integer)$request->input('id');
            $room = Room::find($id);

            if (empty($usr)) {
                return response()->json(["Message" => "Room Not Found"], 404);
            }
        }

            $room->delete();
            return response()->json(["Message" => "Room is deleted"], 200);

        catch(\Exception $e){
            DB::rollback();
            return response()->json(["Message" => $e->getMessage()], 500);
        }
        
    }  

