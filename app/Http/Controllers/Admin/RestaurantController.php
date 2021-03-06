<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use App\Models\City;
use Session;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $restaurants = Restaurant::latest()->paginate(10);
        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::all();
        return view('admin.restaurant.create', compact('cities')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        //
        $restaurant = new Restaurant;
        $restaurant->city_id = $request->city_id;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->restaurant_address = $request->restaurant_address;
        $restaurant->restaurant_type = $request->restaurant_type;
        

        $restaurant->save();
         return redirect()->route('admin.restaurant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $restaurant = Restaurant::find($restaurant_id);
        return view('admin.restaurant.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurant_id)
    {
        //
        $cities = City::all();
        $restaurant = Restaurant::find($restaurant_id);
        return view('admin.restaurant.edit', compact('restaurant', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, $id)
    {
        //
        $restaurant = Restaurant::find($id);
        $restaurant->city_id = $request->city_id;
        $restaurant->restaurant_name = $request->restaurant_name;
        $restaurant->restaurant_address = $request->restaurant_address;
        $restaurant->restaurant_type = $request->restaurant_type;
        $restaurant->update();

        

        Session::flash('updated', 'Restaurant Updated Successfully!');
        return redirect()->route('admin.restaurant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurant_id)
    {
        //
        $restaurant = Restaurant::find($restaurant_id);
        $restaurant->delete();
        
        Session::flash('deleted', 'Restaurant Deleted Successfully!');
        return redirect()->route('admin.restaurant.index');
    }
}
