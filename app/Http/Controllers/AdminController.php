<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showSeller()
    {
        $users = User::where('role', '=', 'pending')->get();
        return view('seller.show', compact('users'));
    }

    public function acceptSeller($id)
    {
        $user = User::find($id);
        $user->role = 'seller';
        $user->save();
        return redirect('/verify-seller')->with('accept', "Success accept $user->name as seller!");
    }

    public function declineSeller($id)
    {
        $user = User::find($id);
        $user->role = 'user';
        $user->save();
        return redirect('/verify-seller')->with('decline', "Success decline $user->name as seller!");
    }

    public function acceptTransaction($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 'success';
        $transaction->save();
        return redirect('/verify-transaction')->with('accept', "Success accept transaction");
    }

    public function declineTransaction($id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = 'declined';
        $transaction->save();
        return redirect('/verify-transaction')->with('decline', "Success decline transaction");
    }

    public function showTransaction()
    {
        $transactions = Transaction::where('status', '=', 'pending')->get();
        return view('transactions.verify', compact('transactions'));
    }
}
