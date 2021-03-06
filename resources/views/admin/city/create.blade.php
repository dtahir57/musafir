@extends('layouts.master')

@section('title', 'Manage Cities')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Add City</h4>
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
                    <form action="{{ route('admin.city.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="city_name" class="form-control" placeholder="City Name" required value="{{ old('city_name') }}" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" name="city_zipcode" class="form-control" required placeholder="Zip Code" />
                            </div>
                            <div class="col-md-6 form-group">
                                <select name="city_province" class="form-control">
                                    <option selected disabled>Province</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Sindh">Sindh</option>
                                    <option value="Khyber Paktun Khwa">Khyber Paktun Khwa</option>
                                    <option value="Balouchistan">Balouchistan</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" name="city_population" class="form-control" required placeholder="Population" />
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="textarea" name="city_description" class="form-control" required placeholder="City Desciption" />
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