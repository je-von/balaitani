@extends('layouts.layout')
@section('content')
<div class="form-div d-flex align-items-center flex-column m-4">
    <h1>Register</h1>
    <form style="width : 30%;" class="bg-light p-4 rounded m-2" method="post">
        @csrf
        <div class="form-group my-2">
            <label for="name">Name</label>
            <input type="text" class="form-control my-2" placeholder="Enter your name" name="name">
            @if($errors->has('name'))
            <p class="text-danger">The name field is required</p>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="email">Email</label>
            <input type="text" class="form-control my-2" placeholder="Enter email" name="email">
            @if($errors->has('email'))
            <p class="text-danger">The email field is required</p>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="password">Password</label>
            <input type="password" class="form-control my-2" placeholder="Password" name="password">
            @if($errors->has('password'))
            <p class="text-danger">The password field is required</p>
            @endif
        </div>
        <div class="form-group my-2">
            <label for="address">Address</label>
            <textarea type="password" class="form-control my-2" placeholder="Address" name="address"></textarea>
            @if($errors->has('address'))
            <p class="text-danger">The address field is required</p>
            @endif
        </div>

        <button type="submit" class="btn btn-success w-100 my-3">Register</button>
        <a href="/login" class="btn btn-success w-100" style="opacity: 0.7">Login</a>

    </form>
</div>
@endsection