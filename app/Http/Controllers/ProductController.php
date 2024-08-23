<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //add product
    function addProduct(Request $req)
    {
        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->description = $req->description;

        $product->file_path = $req->file('file')->store('product');
        $product->save();
        return $product;
    }

    //upload file
    function upload($req)
    {
        return $req->file('file')->store('product');
    }

    //getALlPorducts
    function getAllProduct(){
        return Product::all();
    }

    //getProductBYId
    public function getProductByID(Request $req)
{
    $product = Product::find($req->id);

    if ($product) {
        return response()->json([
            'message' => 'Product found successfully',
            'product' => $product
        ], 200);
    } else {
        return response()->json([
            'message' => 'No Product Found'
        ], 404);
    }
}

    //updateProduct
     function updateProduct(Request $req)
{
    $product = Product::find($req->id);

    if ($product) {
        $product->name = $req->name;
        $product->price = $req->price;
        $product->description = $req->description;

        if ($req->hasFile('file')) {
            $product->file_path = $req->file('file')->store('product');
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product],201);

}}
}
