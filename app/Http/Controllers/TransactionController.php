<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {   
        $transactions = Transaction::where('user_id', '=', auth()->user()->id)->get();
        return view('transactions.index', ['transactions' => $transactions]);
    }

    public function show($id){
        $detail = Transaction::where('user_id', '=', auth()->user()->id)->where('id', '=', $id)->get();
        return view('transactions.detail', ['detail' => $detail]);
    }
}
