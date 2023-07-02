<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->authController = new AuthController();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::orderBy('created_at', 'DESC')->get();
        
        return view('customers.index', compact('customer'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create($request->all());
 
        return redirect()->route('customers')->with('success', 'Customer added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
  
        return view('customers.show', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
  
        return view('customers.edit', compact('customer'));
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
  
        $customer->update($request->all());
  
        return redirect()->route('customers')->with('success', 'customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
  
        $customer->delete();
  
        return redirect()->route('customers')->with('success', 'customer deleted successfully');
    }
}