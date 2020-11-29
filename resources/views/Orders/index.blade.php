@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <ul class="list-group list-group-flush">
                @foreach ($orders as $order)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h4 class="text-primary">{{$order->orderCode}}</h4>
                    <p>{{$order->product->name}}</p>
                    <p>{{$order->product->price}}</p>
                    <p class="text-muted">{{$order->product->created_at}}</p>
                    @if ($order->status == 0)
                    <a href="orders/{{$order->id}}" class="btn btn-warning"> <i class="fas fa-exclamation"></i>
                        Pending</a>
                    @else
                    <button class="btn btn-success"> <i class="fas fa-check-double"></i> Completed</button>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="d-flex justify-content-end my-5">
        {{ $orders->links() }}
    </div>
</div>
@endsection