<?php

namespace App\Http\Controllers\WEB;

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
        $phoneNumber = $request->input('phone_number');

        $existingCustomer = Customer::where('phone_number', $phoneNumber)->first();

        if ($existingCustomer) {
            return redirect()->back()->with('error', 'Phone number already exists');
        }

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

        $existingCustomer = Customer::where('phone_number', $request->input('phone_number'))
            ->where('id', '!=', $id)
            ->first();

        if ($existingCustomer) {
            return redirect()->back()->with('error', 'Phone number already exists');
        }

        $customer->update($request->all());

        return redirect()->route('customers')->with('success', 'Customer updated successfully');
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