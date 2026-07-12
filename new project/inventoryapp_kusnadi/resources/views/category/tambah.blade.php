@extends('layouts.master')
@section('title')
  Tambah Category
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

  <form action="/category" method="POST">
      @csrf
    <div class="mb-3">
      <label class="form-label">Nama Kategory</label>
      <input type="text" name="name" class="form-control" value="{{old('name')}}">
    </div>
    <div class="mb-3">
      <label  class="form-label">Deskripsi</label>
      <textarea name="description" class="form-control" cols="30" rows="10">{{old('description')}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


@endsection