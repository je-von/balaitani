<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        return view('home', compact('products'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->paginate(8)->appends(['keyword' => $keyword]);
        return view('home', compact('products'));
    }

    public function showAddProductPage()
    {
        return view('product.add');
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:1000',
            'stock' => 'required|numeric|min:1',
            'description' => 'required',
            'image' => 'required|mimes:jpg,bmp,png'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;

        $image_name = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
        Storage::putFileAs('public/images', $request->file('image'), $image_name);

        $product->image = 'images/' . $image_name;
        $product->seller_id = auth()->user()->id;

        $product->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('product.detail', compact('product'));
    }
}
