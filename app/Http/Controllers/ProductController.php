<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\Product as ProductResources;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResources::collection(Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required',
            'photo' => 'required',
        ]);
        $product = new Product ([
            'nama_barang' => $request->nama_barang,
            'harga_satuan' => $request->harga_satuan,
            'photo' => $request->photo
        ]);
        $product->save();
        return response()->json(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResources(Product::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return new ProductResources(Product::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_satuan' => 'required',
            'photo' => 'required',
        ]);
        
        $product = Product::findOrFail($id);
        $product->nama_barang = $request->nama_barang;
        $product->harga_satuan = $request->harga_satuan;
        $product->photo = $request->photo;

        // try {
        //     if ($product->save()){
        //         return response()->json([
        //             'data' => 'Ubah Produk berhasil'
        //         ], 200);    
        //     }
        //   }
        //   catch(exception $e) {
        //       return response()->json([
        //           'data' => 'Ubah Produk Gagal'
        //       ]);
        //   } 
        
        $product->save();
        return response()->json([
            'data' => 'Berhasil update!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delProducts = Product::findOrFail($id);
        $delProducts->delete();

        return response()->json(204);
    }
}
