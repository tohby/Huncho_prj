@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-start mb-5">
        <a href="/admin/users" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new user</div>

                <div class="card-body">
                    <form action="{{action("UsersController@store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Enter user name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Enter user email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter brand name">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm password:</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Enter brand name">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="custom-select" name="role">
                                <option selected>Select role</option>
                                <option value="0">Super Admin</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection