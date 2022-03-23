@extends('layout')
@section('content')
    <div class="d-flex justify-content-around content py-5">
        <div>
            <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="border"
                style="border-radius:12px" width="300">
        </div>
        <div class="w-50">
            <h1>{{ $product->name }}</h1>
            <p>Seller: <b class="text-success">{{ $product->seller->name }}</b></p>
            <p>{{ $product->description }}</p>
        </div>
        <div style="width: 15%">
            <div class="border p-3" style="border-radius:12px">
                <h3>Rp.{{ $product->price }}</h3>
                <p>Stock: {{ $product->stock }}</p>
                <form action="/cart/add" method="POST">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text">Quantity</span>
                        <input type="number" class="form-control" placeholder="0" name="quantity" value="1">
                    </div>
                    <button type="submit" class="btn btn-outline-success w-100 my-3">
                        Add to Cart <i class="fal fa-cart-plus mx-1"></i>
                    </button>
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
