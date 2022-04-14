@extends('layouts.layout')
@section('content')

<div class="container container-fluid py-5 content">
  <h2 class="mb-5">Verify Seller</h2>
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
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Shop Name</th>
        <th scope="col">Shop Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->shop_name }}</td>
        <td>{{ $user->shop_address }}</td>
        <td class="d-flex">
          <form action="acceptSeller/{{$user->id}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Accept</button>
          </form>
          <form action="declineSeller/{{$user->id}}" method="post">
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