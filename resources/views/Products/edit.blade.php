@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start mb-5">
        <a href="/admin/products" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new product</div>

                <div class="card-body">
                    <form action="{{action("ProductController@update", $product->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter product name"
                                value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <input type="text" class="form-control" name="desc" placeholder="Enter product description"
                                value="{{$product->desc}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Brand:</label>
                            <select class="custom-select" name="brand">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>
                                    {{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Color:</label>
                            <input type="text" class="form-control" name="color" placeholder="Enter product color"
                                value="{{$product->color}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Transmission:</label>
                            <select class="custom-select" name="transmission">
                                <option value="Automatic" {{'Automatic' === $product->transmission ? 'selected' : ''}}>
                                    Automatic</option>
                                <option value="Manual" {{'Manual' === $product->transmission ? 'selected' : ''}}>Manual
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Engine:</label>
                            <input type="text" class="form-control" name="engine"
                                placeholder="Enter product engine type" value="{{$product->engine}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Price:</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter product price"
                                value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose product image</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection