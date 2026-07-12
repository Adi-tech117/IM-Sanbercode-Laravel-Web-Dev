@extends('layouts.master')
@section('title')
  Detail Category
@endsection
@section('content')

 <h1 class="text-primary">{{$category->name}}</h1>
 <p>{{$category->description}}</p>
 <a href="/category" class="btn btn-secondary my-3">Kembali</a>


@endsection