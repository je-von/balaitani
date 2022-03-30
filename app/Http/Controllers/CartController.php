<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\Shipping;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {   
        $cart = Cart::where('user_id', auth()->user()->id)->get();

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

    public function checkout(){
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $user = User::where('id', auth()->user()->id)->get();
        $payment_methods = PaymentMethod::get();
        $shippings = Shipping::get();

        return view('checkout', ['cart' => $cart, 'user' => $user, 'payment_methods' => $payment_methods, 'shippings' => $shippings]);
    }
}
