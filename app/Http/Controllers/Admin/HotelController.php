<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room; 
use App\Http\Requests\HotelRequest;
use Session;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::latest()->paginate(10);
        return view('admin.hotel.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
        $hotel = new Hotel;
        $hotel->hotel_name = $request->hotel_name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->hotel_address = $request->hotel_address;
        $hotel->hotel_city = $request->hotel_city;
        $hotel->hotel_social = $request->hotel_social;
        $hotel->save();

        Session::flash('created', 'New Hotel Created Successfully!');
        return redirect()->route('admin.hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        return view('admin.hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        return view('admin.hotel.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, $id)
    {
        $hotel = Hotel::find($id);
        $hotel->hotel_name = $request->hotel_name;
        $hotel->hotel_type = $request->hotel_type;
        $hotel->hotel_address = $request->hotel_address;
        $hotel->hotel_social = $request->hotel_social;
        $hotel->update();

        Session::flash('updated', 'Hotel Updated Successfully!');
        return redirect()->route('admin.hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hotel_id)
    {
        $hotel = Hotel::find($hotel_id);
        $hotel->delete();
        
        Session::flash('deleted', 'Hotel Deleted Successfully!');
        return redirect()->route('admin.hotel.index');
    }
}
