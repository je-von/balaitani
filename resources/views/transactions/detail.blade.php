@extends('layouts.layout')
@section('content')

<div class="container container-fluid py-5 content">
    <h2 class="mb-5">
        <a href="/transactions" class=""><i class="fal fa-arrow-left fs-4 text-dark me-2"></i></a> 
        Details
    </h2>

    <div class="shadow rounded p-5">
        <ul class="d-flex flex-column gap-2 w-50 px-0 pb-4">
            <li class="d-flex">
                <span class="w-50 fw-bold">Date of transaction</span>
                <span >{{ $detail->first()->transaction_date->format('F d, Y') }}</span>
            </li>
            <li class="d-flex">
                <span class="w-50 fw-bold">Status</span>
                <span class={{ $detail->first()->status == 'success' ? 'text-success' : 'text-danger' }}>{{ ucwords($detail->first()->status) }}</span>
            </li>
            <li class="d-flex">
                <span class="w-50 fw-bold">Shipping</span>
                <span>{{ $detail->first()->shipping->name }}</span>
            </li>
            <li class="d-flex">
                <span class="w-50 fw-bold">Payment method</span>
                <span>{{ $detail->first()->payment_method->name }}</span>
            </li>
        </ul>
        <table class="table table-hover align-middle border">
            <thead class="table-secondary">
              <tr>
                <th scope="col" class="border-bottom-0 ps-4">Product</th>
                <th scope="col" class="border-bottom-0 text-end ps-3">Price</th>
                <th scope="col" class="border-bottom-0 text-end ps-3">Quantity</th>
                <th scope="col" class="border-bottom-0 text-end ps-3 pe-4">Total Price</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp

                @foreach ($detail->first()->transaction_details as $d)
                @php
                    $total += $d->product->price * $d->quantity;
                @endphp
                <tr>
                    <th scope="row" class="ps-4 pe-3 d-flex align-items-center gap-4 w-fit-content">
                            <img src="{{ Storage::url($d->product->image) }}" alt="Product Image" width="100" class="my-2" style="border-radius:12px;">
                        <p class="mb-0">{{ $d->product->name }}</p>
                    </th>
                    <td class="text-end ps-3">Rp {{ number_format($d->product->price, 2) }}</td>
                    <td class="text-end ps-3">{{ $d->quantity }}</td>
                    <td class="text-end ps-3 pe-4">Rp {{ number_format($d->product->price * $d->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end ps-4 fw-bold">Subtotal</td>
                    <td class="text-end pe-4">Rp {{ number_format($total, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Shipping Fee</td>
                    <td class="text-end pe-4">Rp {{ number_format($detail->first()->shipping->price, 2) }}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Discount</td>
                    <td class="text-end pe-4">-Rp 0.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Net Total</td>
                    <td class="text-end pe-4">Rp {{ number_format($total+$detail->first()->shipping->price, 2)  }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    
</div>
@endsection