@extends('layouts.master')

@section('title', 'Manage Hotels')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Create New Hotel</h4>
                    <a href="{{ route('admin.hotel.index') }}" role="button" class="btn btn-success float-right">View All Hotels</a>
                </div>
            </div>
        </div>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.hotel.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="hotel_name" class="form-control" placeholder="Hotel Name" required value="{{ old('hotel_name') }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="hotel_type" class="form-control">
                                    <option selected disabled>Select Type</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="hotel+Restaurant">Hotel + Restaurant</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="hotel_address" class="form-control" placeholder="Hotel Address (Optional)" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="hotel_city" class="form-control">
                                    <option selected disabled>City</option>
                                    <option value="karachi">Karachi</option>
                                    <option value="lahore">Lahore</option>
                                    <option value="islamabad">Islamabad</option>
                                    <option value="multan">Multan</option>
                                </select>
                            </div>
                             <div class="col-md-6 form-group">
                                <input type="text" name="hotel_social" class="form-control" placeholder="Facebook/Instagram Link (Optional)" />
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