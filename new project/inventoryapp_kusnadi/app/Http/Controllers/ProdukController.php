<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;



class ProdukController extends Controller implements HasMiddleware

{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('admin', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::get();
        return view('product.read', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('product.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //membuat validation
        $request->validate([
            'name' => "required|min:5",
            'description' => "required",
            'price' => "required|numeric",
            'stock' => "required|numeric",
            'category_id' => "required",
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('image'), $imageName);

        $produk = new Products;

        $produk->name = $request->input('name');
        $produk->description = $request->input('description');
        $produk->price = $request->input('price');
        $produk->stock = $request->input('stock');
        $produk->category_id = $request->input('category_id');
        $produk->image = $imageName;

        $produk->save();
        return redirect('/product')->with('success', 'Berhasil Tambah Data Produk !!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);

        

        return view('product.detail', ['product'=>$product]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $categories = Category::get();
        return view('product.edit', ['product'=>$product, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //membuat validation
        $request->validate([
            'name' => "required|min:5",
            'description' => "required",
            'price' => "required|numeric",
            'stock' => "required|numeric",
            'category_id' => "required",
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        $product = Products::find($id);

        if($request->hasFile('image')){
            if($product->image){
                if(File::exists(public_path('image/'.$product->image))){
                    File::delete(public_path('image/'.$product->image));
                }

                $imageName = time().'.'.$request->image->extension();

                $request->image->move(public_path('image'), $imageName);

                $product->image = $imageName;

            }
            
        }

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');

        $product->save();
        return redirect('/product')->with('success', 'Berhasil Update Data Produk !!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
            if($product->image){
                if(File::exists(public_path('image/'.$product->image))){
                    File::delete(public_path('image/'.$product->image));
                }
            }
 
        $product->delete();
        return redirect('/product')->with('success', 'Data Produk berhasil dihapus !!');


    }
}
