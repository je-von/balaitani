@extends('layouts.layout')
@section('content')
    <div class="form-div d-flex align-items-center flex-column m-4">
        <h1>Register Seller</h1>
        <form style="min-width : 30%;" class="bg-light p-4 rounded m-2" method="post">
            @csrf
            <div class="form-group my-2">
                <label for="name">Shop Name</label>
                <input type="text" class="form-control my-2" placeholder="Enter your name" name="name">
                @if ($errors->has('name'))
                    <p class="text-danger">The name field is required</p>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="address">Shop Address</label>
                <textarea type="password" class="form-control my-2" placeholder="Address" name="address"></textarea>
                @if ($errors->has('address'))
                    <p class="text-danger">The address field is required</p>
                @endif
            </div>

            <button type="submit" class="btn btn-success w-100 my-3">Register Seller</button>
            <a href="/login" class="btn btn-success w-100" style="opacity: 0.7">Login</a>
            @if (session('regist'))
                <div class="alert alert-success mt-3">
                    {{ Session::get('regist') }}
                </div>
            @endif
        </form>
    </div>
@endsection
