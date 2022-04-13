<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Cart;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {   
        $transactions = Transaction::where('user_id', '=', auth()->user()->id)->get();
        return view('transactions.show', ['transactions' => $transactions]);
    }

    public function show($id){
        $detail = Transaction::where('id', '=', auth()->user()->id)->where('id', '=', $id)->get();
        return view('transactions.detail', ['detail' => $detail]);
    }

    public function add(Request $request){

        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->status = 'pending';
        $transaction->transaction_date = now();
        $transaction->shipping_id = $request->shipping_id;
        $transaction->payment_method_id = $request->payment_method_id;

        $transaction->save();

        $cart = Cart::where('user_id', '=', auth()->user()->id)->get();

        foreach ($cart as $item){
            error_log($transaction->id);
            $transactionDetail = new TransactionDetail();
            $transactionDetail->transaction_id = $transaction->id;
            $transactionDetail->product_id = $item->product_id;
            $transactionDetail->quantity = $item->quantity;

            $transactionDetail->save();
            $item->delete();
        }
        return redirect('/transactions/'.$transaction->id)->with('success', 'Transaction success!');
    }
}
