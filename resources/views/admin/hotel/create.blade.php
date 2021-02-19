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
                                <select name="hotel_class" class="form-control">
                                    <option selected disabled>Select Hotel Class</option>
                                    <option value="standard">Standard</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="hotel_address" class="form-control" placeholder="Hotel Address (Optional)" />
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