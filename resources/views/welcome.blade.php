@extends('layouts.app')

@section('content')
@include('layouts/slider')

<div class="container p-5">
    <div class="text-weight-bold bg-dark text-white p-2 mb-3">
        <h4>Latest Vehicles</h4>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/cars/'.$product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <ul class="list-group list-group-flush">
                    <a href="/inventories/{{$product->id}}">
                        <li class="list-group-item">{{ $product->name }}</li>
                    </a>
                    <li class="list-group-item">Engine: {{ $product->engine }}</li>
                    <li class="list-group-item text-primary h4 font-weight-bold">{{ $product->price }}</li>
                </ul>
                <div class="card-body">
                    @if (Auth::check())
                    <a href="/{{$product->id}}/buy" class="btn btn-link">Buy Now</a>
                    @else
                    <span class="text-info"><i class="fas fa-info-circle"></i> Please login to purchase this item</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if ($count > 6)
    <div class="mt-5">
        <a href="/inventories" type="button" class="btn btn-primary btn-lg btn-block">View all cars</a>
    </div>
    @endif
</div>
@endsection