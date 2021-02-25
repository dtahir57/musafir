@extends('layouts.master')

@section('title', 'Manage Rooms')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Hotels</h4>
                    <a href="{{ route('admin.room.index') }}" role="button" class="btn btn-success float-right">Manage Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection