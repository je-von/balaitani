@extends('layouts.layout')
@section('content')
    @if (count($cart) > 0)
        <div class="container container-fluid py-5 content">
            <h2 class="mb-5">Billing details</h2>

            <form class="details d-flex gap-5 justify-content-between my-3" action="/checkout" onsubmit="return validate()"
                method="post">
                @csrf
                <div style="min-width: 66.66%">
                    <div class="card p-4 shadow rounded-lg mb-5">
                        <h5 class="fw-medium m-0">Personal information</h4>
                            <hr>
                            <div class="d-flex justify-content-between gap-4 mt-2">
                                <div class="mb-3 w-50">
                                    <label for="exampleFormControlInput1" class="form-label">Full name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="{{ $user->first()->name }}" readonly>
                                </div>
                                <div class="mb-3 w-50">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="{{ $user->first()->email }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Address</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{ $user->first()->address }}" readonly>
                            </div>
                    </div>
                    <div class="card p-4 shadow rounded-lg mb-5">
                        <h5 class="fw-medium m-0">Shipping details</h4>
                            <hr>
                            <div class="mb-3">
                                <label for="shipping_id" class="form-label">Shipping service</label>
                                <select class="form-select" aria-label="Default select example"
                                    id="shippingServiceSelect" name="shipping_id">
                                    <option id="shippingServiceOptionUnselected" value="0" data-price="0" selected>Choose
                                        shipping service</option>
                                    @foreach ($shippings as $s)
                                        <option id="shippingServiceOption" value="{{ $s->id }}"
                                            data-price="{{ $s->price }}">{{ $s->name }} (Rp
                                            {{ number_format($s->price, 2) }})</option>
                                    @endforeach
                                </select>
                                <p id="shippingServiceAlert" class="text-danger mt-2 d-none" role="alert">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    Please choose your shipping service
                                </p>
                            </div>
                    </div>
                    <div class="card p-4 shadow rounded-lg mb-5">
                        <h5 class="fw-medium m-0">Payment</h4>
                            <hr>
                            <div class="mb-3">
                                <label for="payment_method_id" class="form-label">Payment method</label>
                                <select class="form-select" aria-label="Default select example" name="payment_method_id"
                                    id="paymentMethodSelect">
                                    <option value="0" selected>Choose payment method</option>
                                    @foreach ($payment_methods as $pm)
                                        <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                    @endforeach
                                </select>
                                <p id="paymentMethodAlert" class="text-danger mt-2 d-none" role="alert">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    Please choose your payment method
                                </p>
                            </div>
                    </div>
                </div>
                <div class="card p-4 shadow rounded-lg" style="min-width: 33.33%; height: fit-content;">
                    <h5 class="fw-medium m-0">Order summary</h5>
                    <hr>
                    <ul class="list-unstyled mb-0">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart as $item)
                            <li class="">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-3 mb-4">
                                        <div class="" style="width: 16%" ;>
                                            <img src="{{ Storage::url($item->product->image) }}" alt="Product Image"
                                                class="w-100" style="border-radius:12px;">
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-3">{{ $item->product->name }}</h6>
                                            <p style="line-height: 0">Rp
                                                {{ number_format($item->product->price * $item->quantity, 2) }}</p>
                                        </div>
                                    </div>
                                    <p>{{ $item->quantity }}x</p>
                                </div>
                            </li>
                            @php
                                $total += $item->product->price * $item->quantity;
                            @endphp
                        @endforeach
                    </ul>
                    <hr class="my-0">
                    <ul class="my-3 p-0 d-flex flex-column gap-1">
                        <li class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span id="subtotal" data-value="{{ $total }}">Rp
                                {{ number_format($total, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Tax</span>
                            <span id="tax"></span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Discount</span>
                            <span>-Rp 0.00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>Shipping fee</span>
                            <span id="shippingFee"></span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold" id="total"></span>
                        </li>
                        <button type="submit" class="btn btn-success mt-4"><i class="fas fa-money-check me-2"></i>Pay
                            Now</button>
                    </ul>
                </div>
        </div>
        </div>

        <script>
            const shippingServiceSelect = document.getElementById("shippingServiceSelect")
            const paymentMethodSelect = document.getElementById('paymentMethodSelect')

            function isValid(select, alertBox) {
                alertBox.classList.add('d-none')

                if (select.value == 0) {
                    select.focus()
                    alertBox.classList.remove('d-none')

                    return false;
                } else {
                    return true;
                }
            }

            function validate() {
                if (isValid(shippingServiceSelect, shippingServiceAlert) && isValid(paymentMethodSelect, paymentMethodAlert)) {
                    return true;
                }

                return false;
            }

            const formatPrice = (price) => price.toLocaleString('id', {
                style: 'currency',
                currency: 'IDR'
            })

            const shippingFeeSpan = document.getElementById('shippingFee')
            const subtotalSpan = document.getElementById('subtotal');
            const taxSpan = document.getElementById('tax');
            const totalSpan = document.getElementById('total')

            shippingFeeSpan.innerText = 'Rp 0.00'

            taxSpan.innerText = formatPrice(0.1 * subtotalSpan.dataset.value)
            totalSpan.innerText = formatPrice(1.1 * subtotalSpan.dataset.value + 0)

            shippingServiceSelect.onchange = (e) => {
                e.preventDefault();
                var idx = shippingServiceSelect.selectedIndex

                var a = formatPrice(shippingServiceSelect.options[idx].dataset.price)
                shippingFeeSpan.innerText = formatPrice(parseInt(shippingServiceSelect.options[idx].dataset.price))

                totalSpan.innerText = formatPrice(1.1 * subtotalSpan.dataset.value + parseInt(shippingServiceSelect.options[
                    idx].dataset.price))
            }
        </script>
    @else
        <div class="container container-fluid content pt-5">
            <div class="alert alert-danger w-100 " role="alert">
                Oops, you cannot check out unless your cart is not empty! Back to <a href="/" class="underline"
                    style="color: inherit;">Main Menu</a>?
            </div>
        </div>
    @endif
@endsection
