@extends('layouts.master')

@section('title', 'Manage Rooms')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Edit Rooms</h4>
                    <a href="{{ route('admin.room.index') }}" role="button" class="btn btn-success float-right">View All Rooms</a>
                </div>
            </div>
        </div>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.room.update', $room->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="row">
                           <div class="col-md-6 form-group">
                                <select name="hotel_id" class="form-control">
                                    <option selected disabled>Select Hotel</option>
                                
                                    <option value="{{$room->hotel->id }}" @if($room->hotel_id === '{{ $room->hotel->id }}') selected @endif> {{ $room->hotel->hotel_name }} </option>
                                
                                
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="room_no" class="form-control" placeholder="Room No" required value="{{ $room->room_no }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="room_floor" class="form-control" placeholder="Room floor" required value=" {{ $room->room_floor }} " />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="room_type" class="form-control">
                                    <option selected disabled>Select Room Type</option>
                                    <option value="single" @if($room->room_type === 'single') selected @endif>Single</option>
                                    <option value="standard" @if($room->room_type === 'standard') selected @endif>Standard</option>
                                    <option value="luxury" @if($room->room_type === 'luxury') selected @endif>Luxury</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="room_capacity" class="form-control">
                                    <option selected disabled>Room Capacity</option>
                                    <option value="1" @if($room->room_capacity === '1') selected @endif>1</option>
                                    <option value="2" @if($room->room_capacity === '2') selected @endif>2</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="room_status" class="form-control">
                                    <option selected disabled>Room Status</option>
                                    <option value="vacant and ready" @if($room->room_status === 'vacant and ready') selected @endif>Vacant and Ready</option>
                                    <option value="occupied" @if($room->room_status === 'occupied') selected @endif>OCC-Occupied</option>
                                    <option value="do not disturb" @if($room->room_status === 'do not disturb') selected @endif>DND- Do Not Disturb</option>
                                    <option value="on queue" @if($room->room_status === 'on queue') selected @endif>On-Queue</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="room_price" class="form-control" placeholder="Price per Night" required value="{{ $room->room_price }}"/>
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