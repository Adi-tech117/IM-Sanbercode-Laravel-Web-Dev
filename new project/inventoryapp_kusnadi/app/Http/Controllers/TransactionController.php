<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){

    $user = Auth::user();
    if($user->role === 'admin'){
        $transactions = Transactions::get();
        

    }else{
        $transactions = Transactions::where('user_id', $user->id)->get();
    }    
    
    return view('transactions.index', ['transactions'=>$transactions]);
    }

    public function create(){

        $products = Products::get();
        return view('transactions.create', ['products'=>$products]);

    }

    public function store(Request $request){


        //membuat validation
        $request->validate([
            'product_id' => "required",
            'type' => "required|string|in:In,On",
            'amount' => "required|numeric",
            'notes' => "nullable|string|max:255",
            
        ]);


        $id_user = Auth::id();

        //memasukkan ke database
        $transactions = new Transactions;

        $transactions->product_id = $request->input('product_id');
        $transactions->type = $request->input('type');
        $transactions->amount = $request->input('amount');
        $transactions->notes = $request->input('notes');
        $transactions->user_id = $id_user;


        $transactions->save();

        $products = Products::find($request->input('product_id'));
        //$products->decrement('stock', $amount);
        if ($products) {
        $products->decrement('stock', $request->input('amount'));
    }


        return redirect('/transactions')->with('success', 'Transaksi berhasil!');
    }

    public function edit($id){

        $transactions = Transactions::find($id);

        return view('transactions.edit', ['transactions'=>$transactions]);

    }

    public function update($id, Request $request){

        

        //membuat validation
        $request->validate([
            'type' => "required|string|in:In,On",
            
            
        ]);

        $transactions = Transactions::find($id);

        $transactions->type = $request->input('type');
        
        $transactions->save();

        return redirect('/transactions')->with('success', 'Type transaksi berhasil diubah!');

    }
}
