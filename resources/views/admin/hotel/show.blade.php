@extends('layouts.master')

@section('title', 'Manage Hotels')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Hotels</h4>
                    <a href="{{ route('admin.hotel.index') }}" role="button" class="btn btn-success float-right">Manage Hotels</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection