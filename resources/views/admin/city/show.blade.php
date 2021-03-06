@extends('layouts.master')

@section('title', 'Manage Cities')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Manage Cities</h4>
                    <a href="{{ route('admin.city.index') }}" role="button" class="btn btn-success float-right">Manage Cities</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection