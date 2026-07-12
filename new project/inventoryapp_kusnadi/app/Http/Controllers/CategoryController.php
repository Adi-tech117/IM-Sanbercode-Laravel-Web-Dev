<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CategoryController extends Controller
{
    public function create(){
        return view('category.tambah');
    }

    public function index(){
        $categories = DB::table('categories')->get();

        return view('category.tampil', ['categories'=>$categories]);
    }

    public function store(Request $request){
        //membuat validation
        $request->validate([
            'name' => "required|min:6",
            'description' => "required",
        ], [
        "required"=>"inputan :attribute wajib diisi",
        "min"=>"inputan :attribute minimal :min karakter",
        ]);
        $now = Carbon ::now();

        //insert data ke DB tabel categories
        DB::table('categories')->insert([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'created_at' => $now,
        'updated_at' => $now,
        ]);

        return redirect('/category')->with('success', 'Category berhasil dibuat!');

    }
    public function show($id){
        $category = DB ::table('categories') -> find($id);
        return view('category.detail', ['category'=>$category]);

    }
    public function edit($id){
        $category = DB ::table('categories') -> find($id);
        return view('category.edit', ['category'=>$category]);

    }

    public function update(Request $request, $id){
        //membuat validation
        $request->validate([
            'name' => "required|min:6",
            'description' => "required",
        ], [
        "required"=>"inputan :attribute wajib diisi",
        "min"=>"inputan :attribute minimal :min karakter",
        ]);
        $now = Carbon ::now();

        //Update Data by parameter id
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name' => $request->input("name"),
                'description' => $request->input("description"),
                'updated_at' => $now,
            ]);


        

        return redirect('/category')->with('success', 'Category berhasil diubah!');

    }
    public function destroy($id){
        DB::table('categories')->where('id', $id)->delete();
        return redirect('/category')->with('success', 'Category berhasil didelete!');

    }
}
