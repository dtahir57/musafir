@extends('layouts.master')

@section('title', 'Manage Cities')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Edit City</h4>
                    <a href="{{ route('admin.city.index') }}" role="button" class="btn btn-success float-right">View All Cities</a>
                </div>
            </div>
        </div>
        @foreach($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.city.update', $city->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="city_name" class="form-control" placeholder="City Name" required value="{{ $city->city_name }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" name="city_zipcode" class="form-control" placeholder="Zip Code" required value="{{ $city->city_zipcode }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="city_province" class="form-control">
                                    <option selected disabled>Province</option>
                                    <option value="Punjab" @if($city->city_province === 'Punjab') selected @endif>Punjab</option>
                                    <option value="Sindh"@if($city->city_province === 'Sindh') selected @endif>Sindh</option>
                                    <option value="Khyber Paktun Khwa" @if($city->city_province === 'Khyber Paktun Khwa') selected @endif>Khyber Paktun Khwa</option>
                                    <option value="Balouchistan" @if($city->city_province === 'Balouchistan') selected @endif>Balouchistan</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 form-group">
                                <input type="number" name="city_population" class="form-control" placeholder="Population" required value="{{ $city->city_population }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="textarea" name="city_description" class="form-control" placeholder="Description" required value="{{ $city->city_description }}" />
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