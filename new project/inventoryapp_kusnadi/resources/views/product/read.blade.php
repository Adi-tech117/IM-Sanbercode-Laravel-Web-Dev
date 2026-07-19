@extends('layouts.master')
@section('title')
  List Products
@endsection
@section('content')
@if(Session::has('success'))
  <div class="alert alert-primary">
       {{session('success')}}
   </div>
@endif

 @if (Auth::check() && Auth::user()->role ==='admin')
<a href="/product/create" class="btn btn-sm btn-primary my-3">Tambah</a>
@endif

<div class="row">
    @forelse($products as $item)
        <div class="col-4">
            <div class="card" >
                <img src="{{asset('image/'.$item->image)}}"  height="200px"   class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item->name}}</h5>
                    <span class="badge bg-info text-dark">{{$item->category->name}}</span>
                    <p class="card-text">{{Str::limit($item->description, 100)}}</p>
                    <div class="d-grid">
                        <a href="/product/{{$item->id}}" class="btn btn-primary">Read More</a>
                    </div>

                    @if (Auth::check() && Auth::user()->role ==='admin')
                    <div class="row my-3">
                        <div class="col">
                            {{---Edit----}}
                            <div class="d-grid">
                                <a href="/product/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                        <div class="col">
                            {{---Delete---}}
                            
                                <form action="/product/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-grid">
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </div>
                                </form>
                            
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>

        </div>
    @empty

        <h4> Produk masih kosong</h4>
    @endforelse

</div>
@endsection