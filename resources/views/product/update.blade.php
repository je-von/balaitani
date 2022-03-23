@extends('layouts.layout')
@section('content')
    <div class="form-div d-flex align-items-center flex-column m-4">
        <h1>Update Product</h1>
        <form style="width : 30%;" class="bg-light p-4 rounded m-2" method="post" enctype="multipart/form-data">
            {{ method_field('put') }}
            @csrf
            <div class="form-group my-2">
                <label for="name">Name</label>
                <input value="{{ $product->name }}" type="text" class="form-control my-2" placeholder="Enter product name"
                    name="name">
                @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="price">Price</label>
                <div class="input-group my-2">
                    <span class="input-group-text">Rp</span>
                    <input value="{{ $product->price }}" type="number" class="form-control" placeholder="Enter Price"
                        name="price">
                </div>
                @if ($errors->has('price'))
                    <p class="text-danger">{{ $errors->first('price') }}</p>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="stock">Stock</label>
                <input value="{{ $product->stock }}" type="number" class="form-control my-2" placeholder="Enter stock"
                    name="stock">
                @if ($errors->has('stock'))
                    <p class="text-danger">{{ $errors->first('stock') }}</p>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="description">Description</label>
                <textarea type="password" class="form-control my-2" placeholder="Description"
                    name="description">{{ $product->description }}</textarea>
                @if ($errors->has('description'))
                    <p class="text-danger">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="image">Image</label>
                <input class="form-control my-2" type="file" name="image">
                @if ($errors->has('image'))
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-success w-100 my-3">Update</button>
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ Session::get('success') }}
                </div>
            @endif
        </form>
    </div>
@endsection
