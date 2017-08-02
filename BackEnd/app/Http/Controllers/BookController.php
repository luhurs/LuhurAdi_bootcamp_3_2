<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAllBooking (){
        $allBook = booking::get();
        return response()->json($allBook, 200);
    }

    public function BookRoom(Request $request){
        DB::beginTransaction();

        try{
            $this->validate($request, [
                'user_id' => 'required',
                'room_id'  => 'required',
            ]);

        $book = new booking;
        $book->user_id = $request->input('user_id');
        $book->room_id = $request->input('room_id');
        $book->start = $request->input('start_date');
        $book->end = $request->input('end_date');
        $book->pay = $request->input('payment_method');
        $book->save();

        DB::commit();
        return response()->json(["message" => "Add booking success!"], 200);
        }
        
        catch(\Exception $e){
            DB::rollback();
            return response()->json(["message" => $e->getMessage()], 500);
        }
    }
}
