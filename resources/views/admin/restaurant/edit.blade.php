@extends('layouts.master')

@section('title', 'Manage Restaurants')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Edit Restaurants</h4>
                    <a href="{{ route('admin.restaurant.index') }}" role="button" class="btn btn-success float-right">View All Restaurants</a>
                </div>
            </div>
        </div>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.restaurant.update', $restaurant->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="restaurant_name" class="form-control" placeholder="Restaurant Name" required value="{{ $restaurant->restaurant_name }}" />
                            </div>
                           
                            <div class="col-md-6 form-group">
                                <input type="text" name="restaurant_address" class="form-control" placeholder="Restaurant Address" required value="{{ $restaurant->restaurant_address }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="restaurant_type" class="form-control">
                                    <option selected disabled>Restaurant Type</option>
                                    <option value="Continental" @if($restaurant->restaurant_type === 'Continental') selected @endif>Continental</option>
                                    <option value="Chinese" @if($restaurant->restaurant_type === 'Chinese') selected @endif>Chinese</option>
                                    <option value="Desi Food" @if($restaurant->restaurant_type === 'Desi Food') selected @endif>Desi Food</option>
                                    <option value="Fast Food" @if($restaurant->restaurant_type === 'Fast Food') selected @endif>Fast Food</option>
                                    <option value="Ice Cream Parlor" @if($restaurant->restaurant_type === 'Ice Cream Parlor') selected @endif>Ice Cream Parlor</option>
                                    <option value="Desi Food" @if($restaurant->restaurant_type === 'Desi Food') selected @endif>Chinese</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="city_id" class="form-control">
                                    <option selected disabled>Select City</option>           

                                @foreach($cities as $city)
                                    <option value="{{$city->id }}" @if($city->_id === '{{ $restaurant->city_id }}') selected @endif> {{ $city->city_name }} </option>
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