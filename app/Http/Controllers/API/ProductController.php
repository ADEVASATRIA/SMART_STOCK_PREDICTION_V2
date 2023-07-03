<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduk;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $produks = Product::all();

        return response()->json(["products" => $produks]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required|exists:category_products,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $produk = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return response()->json($produk, 201);
    }

    public function show($id)
    {
        $produk = Product::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required|exists:category_products,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $produk = Product::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $produk->name = $request->name;
        $produk->price = $request->price;
        $produk->stock = $request->stock;
        $produk->category_id = $request->category_id;
        $produk->save();

        return response()->json($produk);
    }

    public function destroy($id)
    {
        $produk = Product::find($id);

        if (!$produk) {
            return response()->json(['message' => 'Produk not found'], 404);
        }

        $produk->delete();

        return response()->json(['message' => 'Produk deleted']);
    }
}
