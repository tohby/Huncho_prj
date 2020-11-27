@extends('layouts.app')

@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('storage/cars/'.$product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-4">
            <h4 class="font-weight-bold">{{ $product->name }}</h4>
            <p>{{ $product->desc }}</p>
            <p>Brand: {{ $product->brand->name }}</p>
            <p>Engine: {{ $product->engine }}</p>
            <p>Color: {{ $product->color}}</p>
            <h4 class="font-weight-bold text-primary">{{ $product->price }}</h4>
            <div class="card-body">
                @if (Auth::check())
                <a href="/{{$product->id}}/buy" class="btn btn-primary px-4 h4" role="button">Buy Now</a>
                @else
                <span class="text-info"><i class="fas fa-info-circle"></i> Please login to purchase this item</span>
                @endif
            </div>
        </div>
    </div>

    <div id="feedback" class="my-5">
        @if (Auth::check())
        <form action="{{action("HomeController@feedback_submit")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Drop a feedback:</label>
                <textarea class="form-control" name="feedback" rows="3"></textarea>
            </div>
            <input type="hidden" name="productId" value="{{$product->id}}">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit feedback</button>
        </form>
        @else
        <span class="text-info"><i class="fas fa-info-circle"></i> Please login to review this item</span>
        @endif

        @if (count($feedbacks) > 0)
        @foreach ($feedbacks as $feedback)
        <div class="media my-5">
            <img src="{{asset('images/thumbnail.png')}}" class="mr-3 rounded img-fluid thumbnail">
            <div class="media-body">
                <h5 class="mt-0">{{$feedback->user->name}}</h5>
                {{$feedback->feedback}}
            </div>
        </div>
        @endforeach
        @else
        <span class="text-info"><i class="fas fa-info-circle"></i> There are no reviews for this product, be the first
            to add one</span>
        @endif
    </div>
</div>
@endsection