@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-5">
        <a href="/admin/products/create" class="btn btn-primary"> <i class="fas fa-plus"></i> Add new</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-12">
            @foreach ($products as $product)
            <div class="card p-1">
                <div class="card-body">
                    <div class="d-flex">
                        <img src="/storage/cars/{{$product->image}}" alt="{{$product->name}}"
                            class="rounded img-fluid thumbnail">
                        <div class="ml-3">
                            <h5> {{$product->name}}</h5>
                            <p>{{$product->desc}}</p>
                            <p>{{$product->price}}</p>
                        </div>
                        <div class="ml-auto h6">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/admin/products/{{ $product->id }}/edit">Edit</a>
                                    <div class="divider"></div>
                                    <form method="POST" action="{{ route('products.destroy',$product->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="dropdown-item text-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection