@extends('layouts.master')

@section('title', 'Manage Restaurants')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Restaurants</h4>
                    <a href="{{ route('admin.restaurant.create') }}" role="button" class="btn btn-success float-right">Add Restaurants</a>
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
                                    <th>Restaurant Name</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th>City</th>
                                    <th style="width: 250px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($restaurants as $restaurant)
                                <tr>

                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $restaurant->restaurant_name }}</td>
                                    <td>{{ $restaurant->restaurant_address }}</td>
                                    <td style="text-transform:capitalize;">{{ $restaurant->restaurant_type }}</td>
                                    <td>{{ $restaurant->city->city_name  }}</td>
                                   
                                    <td>
                                        <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}" role="button" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('admin.restaurant.destroy', $restaurant->id) }}" role="button" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $restaurants->links() }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection