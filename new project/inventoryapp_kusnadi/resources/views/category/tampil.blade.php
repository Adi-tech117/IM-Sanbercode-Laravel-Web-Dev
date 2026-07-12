@extends('layouts.master')
@section('title')
    Tampil Category
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-primary">
            {{session('success')}}
        </div>
    @endif

    <a href="/category/create" class="btn btn-primary btn-sm my-3">Tambah</a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->name}}</td>
                    <td>
                        <form action="category/{{$item->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="/category/{{$item->id}}" class="btn btn-info btn-sm" >Detail</a>
                        <a href="/category/{{$item->id}}/edit" class="btn btn-warning btn-sm" >Edit</a>
                        <input type="submit" class="btn btn-danger btn-sm" value="Delete">

                        </form>
                        


                    </td>
                    
                </tr>

            @empty
                <tr>
                    <td>Category masih kosong</td>
                    
                </tr>

            @endforelse
            
        </tbody>
    </table>

    

@endsection
