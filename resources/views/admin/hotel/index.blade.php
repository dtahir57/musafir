@extends('layouts.master')

@section('title', 'Manage Hotels')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Hotels</h4>
                    <a href="{{ route('admin.hotel.create') }}" role="button" class="btn btn-success float-right">Manage Hotels</a>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hotel Name</th>
                                    <th>Hotel Type</th>
                                    <th>Hotel Address</th>
                                    <th style="width: 250px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotels as $hotel)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $hotel->hotel_name }}</td>
                                    <td style="text-transform:capitalize;">{{ $hotel->hotel_class }}</td>
                                    <td>{{ $hotel->hotel_address }}</td>
                                    <td>
                                        <a href="{{ route('admin.hotel.edit', $hotel->id) }}" role="button" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('admin.hotel.destroy', $hotel->id) }}" role="button" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $hotels->links() }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection