@extends('layouts.app')

@section('content')

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
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $products->links() }}
    </div>
</div>
@endsection