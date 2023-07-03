<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryproducts = CategoryProduct::all();

        return response()->json(['category_products' => $categoryproducts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category_product' => 'required|unique:category_products',
        ]);

        $categoryproduct = CategoryProduct::create($validatedData);

        return response()->json($categoryproduct, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoryproduct = CategoryProduct::find($id);

        if (!$categoryproduct) {
            return response()->json(['message' => 'Category products not found'], 404);
        }

        return response()->json($categoryproduct);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            if (!$id) {
                return response()->json(['message' => 'ID not provided'], 400);
            }

            $validatedData = $request->validate([
                'name_category_product' => 'required|unique:category_products,name_category_product,' . $id,
            ]);

            $categoryproduct = CategoryProduct::find($id);

            if (!$categoryproduct) {
                return response()->json(['message' => 'Category product not found'], 404);
            }

            $categoryproduct->update($validatedData);

            return response()->json($categoryproduct);
        } catch (ValidationException $exception) {
            return response()->json(['message' => $exception->errors()], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$id) {
            return response()->json(['message' => 'ID not provided'], 400);
        }

        $categoryproduct = CategoryProduct::find($id);

        if (!$categoryproduct) {
            return response()->json(['message' => 'Category products not found'], 404);
        }

        if ($categoryproduct->products()->count() > 0) {
            return response()->json(['message' => 'Category has related products and cannot be deleted'], 422);
        }

        $categoryproduct->delete();

        return response()->json(['message' => 'Category products deleted']);
    }
}
