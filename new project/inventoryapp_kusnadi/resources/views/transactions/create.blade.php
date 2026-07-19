@extends('layouts.master')
@section('title')
  Transaksi Produk
@endsection
@section('content')

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form action="/transactions" method="POST">
      @csrf
    <div class="mb-3">
      <label class="form-label">Products</label>
      <select name="product_id" id="">
        <option value="">---Pilih Produk--</option>
        @forelse ($products as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            
        @empty
            <option value="">Produk Kosong</option>
        @endforelse
      </select>
    </div>
    <div class="mb-3">
      <label  class="form-label">Type</label>
      <select   name="type" class="form-control" id="">
        <option value="">---Pilih Type---</option>
            <option>In</option>
            <option>On</option>
      </select>
    </div>
    <div class="mb-3">
      <label  class="form-label">amount</label>
      <input type="number" name="amount" class="form-control" >
    </div>
    <div class="mb-3">
      <label  class="form-label">notes</label>
      <textarea name="text"  name="notes"  class="form-control"  id="" cols="30" rows="10"></textarea>
      
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection