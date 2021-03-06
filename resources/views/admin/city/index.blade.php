@extends('layouts.master')

@section('title', 'Manage Cities')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Cities</h4>
                    <a href="{{ route('admin.city.create') }}" role="button" class="btn btn-success float-right">Add City</a>
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
                                    <th>City Name</th>
                                    <th>Zip Code</th>
                                    <th>Province</th>
                                    <th>Population</th>
                                    <th>Description</th>

                                    <th style="width: 250px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $city->city_name }}</td>
                                    <td style="text-transform:capitalize;">{{ $city->city_zipcode }}</td>
                                    <td>{{ $city->city_province  }}</td>
                                    <td>{{ $city->city_population  }}</td>
                                    <td>{{ $city->city_description  }}</td>
                                    <td>
                                        <a href="{{ route('admin.city.edit', $city->id) }}" role="button" class="btn btn-info btn-sm">Edit</a>
                                        <a href="{{ route('admin.city.destroy', $city->id) }}" role="button" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{ $cities->links() }}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection