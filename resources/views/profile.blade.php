@extends('layouts.app')

@section('content')

<div class="container p-5">
    @if(session('success') || session('error') || count($errors) > 0)
    <div class="container mb-3">
        @include('layouts/messages')
    </div>
    @endif
    <div class="row">
        <div class="col-md-3"><img src="{{asset('images/thumbnail.png')}}" alt="..." class="img-thumbnail"></div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>
                    <form action="{{action("HomeController@storeProfile")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{$user->name}}" placeholder="Enter user name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{$user->email}}" placeholder="Enter user email" disabled>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{$user->address}}" placeholder="Enter user address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm password:</label>
                    <input type="password" class="form-control" name="password_confirmation"
                        placeholder="Enter password">
                </div> --}}
                <button type="submit" class="btn btn-primary float-right">Save</button>
                @method('PUT')
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection