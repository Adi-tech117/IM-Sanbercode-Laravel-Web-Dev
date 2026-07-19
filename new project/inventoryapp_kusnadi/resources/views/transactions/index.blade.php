@extends('layouts.master')
@section('title')
    Transaksi Barang
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
    @endif

    <a href="/transactions/create" class="btn btn-primary btn-sm my-3">Transaksi Barang</a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Product</th>
            <th scope="col">Type</th>
            <th scope="col">Amount</th>
            <th scope="col">Notes</th>
            @if (Auth::check() && Auth::user()->role ==='admin')
            <th scope="col">Action</th>
            @endif
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->type}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->notes}}</td>

                    @if (Auth::check() && Auth::user()->role ==='admin')
                    <td>
                        
                        <a href="/transactions/{{$item->id}}" class="btn btn-info btn-sm" >Update</a>
                          
                    </td>
                    @endif
                    
                </tr>

            @empty
                <tr>
                    <td>Category masih kosong</td>
                    
                </tr>

            @endforelse
            
        </tbody>
    </table>

    

@endsection
