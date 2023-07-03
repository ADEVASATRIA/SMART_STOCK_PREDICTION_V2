<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return response()->json(["Customers" => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'phone_number' => 'required|unique:customers',
            ]);

            $customers = Customer::create($validatedData);

            return response()->json($customers, 201);
        } catch (ValidationException $exception) {
            return response()->json(['message' => $exception->errors()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customers = Customer::find($id);

        if (!$customers) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customers);
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
                'name' => 'required',
                'phone_number' => 'required|unique:customers,phone_number,' . $id,
            ]);

            $customers = Customer::find($id);

            if (!$customers) {
                return response()->json(['message' => 'Customer not found'], 404);
            }

            $customers->update($validatedData);

            return response()->json($customers);
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

        $customers = Customer::find($id);

        if (!$customers) {
            return response()->json(['message' => 'Customer not found'], 404);
        }
        
        $customers->delete();

        return response()->json(['message' => 'Customer deleted']);
    }
}
