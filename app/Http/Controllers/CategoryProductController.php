<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryproduct = CategoryProduct::orderBy('created_at', 'DESC')->get();
        
        return view('categoryproduct.index', compact('categoryproduct'));
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoryproduct.create');
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CategoryProduct::create($request->all());
        
        return redirect()->route('categoryproduct')->with('success', 'Category Product added successfully');
    }

        /**
     * Display the specified resource.
     */
    public function show(string $id_category_product)
    {
        $categoryproduct = CategoryProduct::findOrFail($id_category_product);
        
        return view('categoryproduct.show', compact('categoryproduct'));
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_category_product)
    {
        $categoryproduct = CategoryProduct::findOrFail($id_category_product);
        
        return view('categoryproduct.edit', compact('categoryproduct'));
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_category_product)
    {
        $categoryproduct = CategoryProduct::findOrFail($id_category_product);
        
        $categoryproduct->update($request->all());
        
        return redirect()->route('categoryproduct')->with('success', 'category product updated successfully');
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_category_product)
    {
        $categoryproduct = CategoryProduct::findOrFail($id_category_product);
        
        $categoryproduct->delete();
        
        return redirect()->route('categoryproduct')->with('success', 'category product deleted successfully');
    }
}
