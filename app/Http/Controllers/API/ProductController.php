<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = Product::with('ProductGalleries')->find($id);

            if($product)
            {
                return ResponseFormatter::success($product, "Data produk berhasil diambil");
            } else 
            {
                return ResponseFormatter::error(null, "Data produk tidak ditemukan", 404);
            }
        }

        if($slug)
        {
            $product = Product::with('ProductGalleries')->whereSlug($slug)->first();

            if($product)
            {
                return ResponseFormatter::success($product, "Data produk berhasil diambil");
            } else 
            {
                return ResponseFormatter::error(null, "Data produk tidak ditemukan", 404);
            }
        }

        $product = Product::with('ProductGalleries');

        if($name){
            $product->where('name', 'like', '%'.$name.'%')->get();
        }

        if($type){
            $product->where('type', 'like', '%'.$type.'%')->get();
        }

        if($price_from){
            $product->where('price', '>=', $price_from)->get();
        }

        if($price_to){
            $product->where('price', '<=', $price_to)->get();
        }

        return ResponseFormatter::success($product->paginate($limit), 'Data list produk berhasil diterima');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
