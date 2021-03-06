@extends('layouts.master')

@section('title', 'Manage Restaurants')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Restaurants</h4>
                    <a href="{{ route('admin.restaurant.index') }}" role="button" class="btn btn-success float-right">Manage Restaurants</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection