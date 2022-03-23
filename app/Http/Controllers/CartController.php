<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
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
}
