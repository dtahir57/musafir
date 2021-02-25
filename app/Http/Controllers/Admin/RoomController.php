<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\HotelRequest;
use App\Http\Requests\RoomRequest;
use App\Models\Hotel;

use Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('admin.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotel::all();
        return view('admin.room.create',compact('hotels'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {

        $room = new Room;
        $room->hotel_id = $request->hotel_id;
        $room->room_no = $request->room_no;
        $room->room_floor = $request->room_floor;
        $room->room_capacity = $request->room_capacity;
        $room->room_type = $request->room_type;
        $room->room_status = $request->room_status;
        $room->room_price = $request->room_price;
        $room->save();

        Session::flash('created', 'Room Added Successfully!');
        return redirect()->route('admin.room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($room_id)
    {
        $room = Room::find($room_id);
        return view('admin.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($room_id)
    {
        $room = Room::find($room_id);
        return view('admin.room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $room = Room::find($id);
        $room->room_no = $request->room_no;
        $room->room_floor = $request->room_floor;
        $room->room_capacity = $request->room_capacity;
        $room->room_status = $request->room_status;
        $room->room_price = $request->room_price;
        $room->update();

        Session::flash('updated', 'Room Added Successfully!');
        return redirect()->route('admin.room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($room_id)
    {
        $room = Room::find($room_id);
        $room->delete();
        
        Session::flash('deleted', 'Room Deleted Successfully!');
        return redirect()->route('admin.room.index');
    }
}



