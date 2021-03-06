@extends('layouts.master')

@section('title', 'Manage Restaurants')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add Restaurant</h4>
                    <a href="{{ route('admin.hotel.index') }}" role="button" class="btn btn-success float-right">View All Restaurant</a>
                </div>
            </div>
        </div>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.restaurant.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            
                            <div class="col-md-6 form-group">
                                <input type="text" name="restaurant_name" class="form-control" placeholder="Restaurant Name" required value="{{ old('restaurant_name') }}" />
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <input type="text" name="restaurant_address" class="form-control" placeholder="Restaurant Address" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="restaurant_type" class="form-control">
                                    <option selected disabled>Restaurant Type</option>
                                    <option value="Continental">Continental</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Desi Food">Desi Food</option>
                                    <option value="Fast Food">Fast Food</option>
                                    <option value="Ice Cream Parlor">Ice Cream Parlor</option>
                                    <option value="Desi Food">Chinese</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="city_id" class="form-control">
                                    <option selected disabled>Select City</option>
                            @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                            @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Save" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection