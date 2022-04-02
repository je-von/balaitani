@extends('layouts.layout')
@section('content')
    <style>
        .banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://assets.bwbx.io/images/users/iqjWHBFdfxIU/iJpChCw.ofIg/v1/1200x-1.jpg');
            background-size: cover;
            filter: grayscale(100%) contrast(0.4) blur(2px) brightness(0.5);
            background-position-y: center
        }

    </style>
    <div class="banner position-relative overflow-hidden text-center d-flex flex-column justify-content-center align-items-center"
        style="height: 60vh;">
        <h1 class="text-light display-2 position-relative">Welcome to BalaiTani !</h1>
        <p class="text-light position-relative"><i>No. 1 App to support Indonesian local farmers</i></p>
        <a class="btn btn-outline-light position-relative" href="#">About Us</a>
    </div>
    <div class="d-flex justify-content-center flex-wrap p-3">
        @foreach ($products as $p)
            <div class="card m-3 border-0 shadow" style="width: 18rem;border-radius: 15px;">
                <img class="card-img-top" style="object-fit: cover;border-radius: 15px 15px 0 0;" height="280"
                    src="{{ Storage::url($p->image) }}" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->name }}</h5>
                    <i class="card-subtitle mb-2 text-success">{{ $p->seller->name }} </i>
                    <p class="card-text text-justify w-100" style="height: 50px;overflow: hidden;text-overflow: ellipsis;">
                        {{ $p->description }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center text-center">
                        <p class="m-0">Rp.{{ $p->price }}</p>
                        <a href="/product/{{ $p->id }}" class="btn btn-outline-success">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}

    </div>
@endsection
