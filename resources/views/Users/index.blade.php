@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-5">
        <a href="/admin/users/create" class="btn btn-primary"> <i class="fas fa-plus"></i> Add new User</a>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-12">
            @foreach ($users as $user)
            <div class="card p-1">
                <div class="card-body">
                    <div class="d-flex">
                        {{-- <img src="/storage/users/{{$user->image}}" alt="{{$user->name}}"
                        class="rounded img-fluid thumbnail"> --}}
                        <div class="ml-3">
                            <h5> {{$user->name}} </h5>
                            <p> {{$user->email}} </p>
                        </div>
                        <div class="ml-auto h6">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <form method="POST" action="{{ route('users.destroy',$user->id) }}">
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
    <div class="d-flex justify-content-end mb-5">
        {{ $users->links() }}
    </div>
</div>
@endsection