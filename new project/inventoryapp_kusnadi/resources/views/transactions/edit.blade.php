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

  <form action="/transactions/{{$transactions->id}}" method="POST">
      @csrf
      @method("PUT")
    <div class="mb-3">
      <label class="form-label">Type Status</label>
      <select name="type" id="">
        <option value="">---Pilih Type Status--</option>
        <option value="In">In</option>
        <option value="On">On</option>
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection