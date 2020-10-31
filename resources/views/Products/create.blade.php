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
                    <form action="{{action("ProductController@store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <input type="text" class="form-control" name="desc" placeholder="Enter product description">
                        </div>
                        <div class="form-group">
                            <label for="name">Brand:</label>
                            <select class="custom-select" name="brand">
                                <option selected>Select Brand</option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Color:</label>
                            <input type="text" class="form-control" name="color" placeholder="Enter product color">
                        </div>
                        <div class="form-group">
                            <label for="name">Transmission:</label>
                            <select class="custom-select" name="transmission">
                                <option selected>Select Transmission</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Engine:</label>
                            <input type="text" class="form-control" name="engine"
                                placeholder="Enter product engine type">
                        </div>
                        <div class="form-group">
                            <label for="name">Price:</label>
                            <input type="text" class="form-control" name="price" placeholder="Enter product price">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose product image</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection