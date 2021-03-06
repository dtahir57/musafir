@extends('layouts.master')

@section('title', 'Manage Rooms')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Rooms</h4>
                    <a href="{{ route('admin.room.index') }}" role="button" class="btn btn-success float-right">View All </a>
                </div>
            </div>
        </div>
       @foreach($errors->all() as $error)
          <li class="alert alert-danger">{{ $error }}</li> 
        @endforeach 
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.room.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <select name="hotel_id" class="form-control">
                                    <option selected disabled>Select Hotel</option>
                            @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                            @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="room_no" class="form-control" placeholder="Room No" required value="{{ old('room_no') }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="room_floor" class="form-control" placeholder="Room Floor" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="room_capacity" class="form-control">
                                    <option selected disabled>Room Capacity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="room_type" class="form-control">
                                    <option selected disabled>Select Room Type</option>
                                    <option value="standard">Standard</option>
                                    <option value="luxury">Luxury</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="room_status" class="form-control">
                                    <option selected disabled>Room Status</option>
                                    <option value="vacant and ready">Vacant and Ready</option>
                                    <option value="occupied">OCC-Occupied</option>
                                    <option value="do not disturb">DND- Do Not Disturb</option>
                                    <option value="on queue">On-Queue</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" min="1" step="any" name="room_price" class="form-control" placeholder="Price per Night" />
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