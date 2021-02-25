@extends('layouts.master')

@section('title', 'Manage Room')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Rooms</h4>
                    <a href="{{ route('admin.room.create') }}" role="button" class="btn btn-success float-right">Add Room</a>
                </div>
            </div>
        </div>
        @if(session('created'))
            <li class="alert alert-success">{{ session('created') }}</li>
        @endif
        @if(session('updated'))
            <li class="alert alert-success">{{ session('updated') }}</li>
        @endif
        @if(session('deleted'))
            <li class="alert alert-success">{{ session('deleted') }}</li>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" border="1px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hotel Name</th>
                                    <th>Room no</th>
                                    <th>Floor</th>
                                    <th>Capacity</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Price per Night</th>
                                    <th style="width: 250px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr>

                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $room->hotel->hotel_name }}</td>
                                    <td>{{ $room->room_no }}</td>
                                    <td style="text-transform:capitalize;">{{ $room->room_floor }}</td>
                                    <td>{{ $room->room_capacity  }}</td>
                                    <td>{{ $room->room_type  }}</td>
                                    <td>{{ $room->room_status  }}</td>
                                    
                                    <td>{{ $room->room_price  }}</td>
                                    <td>
                                        <a href="{{ route('admin.room.edit', $room->id) }}" role="button" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('admin.room.destroy', $room->id) }}" role="button" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $rooms->links() }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection