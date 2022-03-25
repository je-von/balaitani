<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {   
        $cart = Cart::select('id', 'name', 'price', 'quantity', 'image', Cart::raw('sum(quantity * price) AS total_price'))->join('products', 'products.id', '=', 'carts.product_id')->where('user_id', auth()->user()->id)->groupBy('id','name', 'price', 'quantity', 'image')->get();
        return view('cart', ['cart' => $cart]);
    }

    public function add(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $validated = $request->validate([
            'quantity' => "required|numeric|min:1|max:$product->stock"
        ]);
        $cart = Cart::where('user_id', '=', auth()->user()->id)->where('product_id', '=', $product_id)->first();
        if ($cart == null) {
            $cart = Cart::create(['user_id' => auth()->user()->id, 'product_id' => $product_id, 'quantity' => $request->quantity]);
        } else {
            // dd($cart);
            $cart->quantity += $request->quantity;
            $cart->save();
        }
        return redirect()->back()->with('success', 'Added to cart successfully!');
    }

    public function delete($product_id)
    {
        $cart = Cart::where('product_id', '=', $product_id)->where('user_id', '=', auth()->user()->id)->first();
        $cart->delete();
        return redirect('/cart');
    }
}
