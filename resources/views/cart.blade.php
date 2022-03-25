@extends('layouts.layout')
@section('content')

<div class="container container-fluid py-5 content">
    <h2 class="mb-5">My Cart</h2>

    <div class="d-flex gap-5">
        @if (count($cart) > 0)
        <ul class="list-group" style="width: 72.5%">
            @foreach ($cart as $item)
                <li class="list-group-item shadow rounded d-flex align-items-center w-100 p-4 gap-4 mb-3">
                    {{-- <input class="form-check-input" style="width: 24px;height: 24px" type="checkbox" value="" aria-label="..."> --}}
                    <div class="d-flex gap-5 w-100" style="/* width:calc(100% - 24px); */">
                        <div class="" style="width: 15%";>
                            <img src="{{ Storage::url($item->image) }}" alt="Product Image" class="w-100" 
                                style="border-radius:12px;">
                        </div>
                        <div class="" style="width: 85%">
                            <h5 class="fw-normal">{{ $item->name }}</h5>
                            <p class="fw-bold">Rp {{ number_format($item->price, 2) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="/product/{{ $item->id }}" class="btn btn-success">Details</a>
                                <div class="d-flex gap-3">
                                    <form action="/cart/delete/{{$item->id}}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        
                                    <button type="submit" class="btn btn-outline-danger"><i class="fal fa-trash-alt"></i></button>
                                    </form>
                                    <div class="input-group" style="width: 150px">
                                        <span class="input-group-text">Quantity</span>
                                        <input type="number" class="form-control" placeholder="0" name="quantity" value="{{ $item->quantity }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="card shadow p-4" style="width: 27.5%; height: fit-content;">
            <h5>Shopping summary</h5>
            <ul class="my-3 p-0 d-flex flex-column gap-2">
                <li class="d-flex justify-content-between">
                    <span>Total price</span>
                    <span>Rp {{ number_format($cart->sum('total_price'), 2) }}</span>
                </li>
                <li class="d-flex justify-content-between">
                    <span>Total items</span>
                    <span>{{ $cart->count() }} {{ $cart->count() > 1 ? 'items' : 'item'}}</span>
                </li>
                <li class="d-flex justify-content-between">
                    <span>Tax</span>
                    <span>Rp {{ number_format($cart->sum('price') / 10, 2) }}</span>
                </li>
                <hr class="my-2">
                <li class="d-flex justify-content-between">
                    <span>Grand total</span>
                    <span>Rp {{ number_format($cart->sum('price') + $cart->sum('price')/10) }}</span>
                </li>
            </ul>
            
            <button class="btn btn-success mt-2"><i class="fas fa-cash-register me-2"></i>Checkout</button>
        </div>
        @else
            <div class="alert alert-danger w-100" role="alert">
                Your cart is empty! Back to <a href="/" class="underline" style="color: inherit;">Main Menu</a>?
              </div>
        @endif
    </div>
    
</div>

@endsection