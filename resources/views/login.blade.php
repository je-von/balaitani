@extends('layout')
@section('content')
<div class="form-div d-flex align-items-center flex-column m-4">
    <h1>Login</h1>
    <form style="width : 30%;" class="bg-light p-4 rounded m-4" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="email">Email</label>
            <input type="text" class="form-control my-2" placeholder="Enter email" name="email">
            @if ($errors->has('email'))
            <p class="text-danger">The email field is required</p>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="password">Password</label>
            <input type="password" class="form-control my-2" placeholder="Password" name="password">
            @if ($errors->has('password'))
            <p class="text-danger">The password field is required</p>
            @endif
        </div>
        <button type="submit" class="btn btn-success w-100 mt-3">Login</button>
        <a href="/register" class="btn btn-success w-100 mt-3" style="opacity: 0.7">Register</a>
        @if (session('failed'))
        <div class="alert alert-danger mt-3">
            {{Session::get('failed')}}
        </div>
        @endif
        @if (session('regist'))
        <div class="alert alert-success mt-3">
            {{Session::get('regist')}}
        </div>
        @endif

    </form>
</div>
@endsection