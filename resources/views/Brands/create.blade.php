@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start mb-5">
        <a href="/admin/brands" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new brand</div>

                <div class="card-body">
                    <form action="{{action("BrandController@store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Brand Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter brand name">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection