<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Models\Restaurant;
use App\Models\City;
use Session;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::latest()->paginate(10);
        return view('admin.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        //
        $city = new City;
        $city->city_name = $request->city_name;
        $city->city_zipcode = $request->city_zipcode;
        $city->city_province = $request->city_province;
        $city->city_population = $request->city_population;
        $city->city_description = $request->city_description;
        
        $city->save();

        Session::flash('created', 'City Added Successfully!');
        return redirect()->route('admin.city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($City_id)
    {
        //
         $city = City::find($city_id);
        return view('admin.city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($city_id)
    {
        //
        $city = City::find($city_id);
        return view('admin.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        //
        $city = new City;
        $city->city_name = $request->city_name;
        $city->city_zipcode = $request->city_zipcode;
        $city->city_province = $request->city_province;
        $city->city_population = $request->city_population;
        $city->city_description = $request->city_description;
        
        $city->update();

        Session::flash('updated', 'City Updated Successfully!');
        return redirect()->route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($City_id)
    {
        //
        $city = City::find($City_id);
        $city->delete();

        Session::flash('deleted', 'City Deleted Successfully!');
        return redirect()->route('admin.city.index');

    }
}
