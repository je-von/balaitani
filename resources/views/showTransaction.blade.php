@extends('layouts.layout')
@section('content')

<div class="container container-fluid py-5 content">
  <h2 class="mb-5">Verify Transactions</h2>
  @if (session('accept'))
  <div class="alert alert-success mt-3">
    {{ Session::get('accept') }}
  </div>
  @endif
  @if (session('decline'))
  <div class="alert alert-danger mt-3">
    {{ Session::get('decline') }}
  </div>
  @endif
  <table class="table table-hover table-striped align-middle border shadow-sm">
    <thead class="">
      <tr>
        <th scope="col">Date of transaction</th>
        <th scope="col">Status</th>
        <th scope="col">Shipping</th>
        <th scope="col">Payment method</th>
        <th scope="col">Details</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($transactions as $transaction)
      <tr>
        <td>{{ $transaction->transaction_date->format('F d, Y') }}</td>
        <td class="{{ $transaction->status == 'success' ? 'text-success' : 'text-danger' }}">{{ ucwords($transaction->status) }}</td>
        <td>{{ $transaction->shipping->name }}</td>
        <td>{{ $transaction->payment_method->name }}</td>
        <td> <a href="/transactions/{{ $transaction->id }}" class="btn btn-outline-success btn-sm">Details</a> </td>
        <td class="d-flex">
          <form action="acceptTransaction/{{$transaction->id}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Accept</button>
          </form>
          <form action="declineTransaction/{{$transaction->id}}" method="post">
            @csrf
            <button class="btn btn-danger mx-1">Reject</button>
          </form>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection