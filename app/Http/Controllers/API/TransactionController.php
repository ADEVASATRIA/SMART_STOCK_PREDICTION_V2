<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();

        return response()->json(['transactions' => $transactions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_customer' => 'required',
            'id_product' => 'required',
            'total_product' => 'required|integer',
            'total_price' => 'required|integer',
        ]);

        $transaction = Transaction::create($validatedData);

        return response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json($transaction);
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
                'id_customer' => 'required',
            'id_product' => 'required',
            'total_product' => 'required|integer',
            'total_price' => 'required|integer',
            ]);

            $transaction = Transaction::find($id);

            if (!$transaction) {
                return response()->json(['message' => 'Transaction not found'], 404);
            }

            $transaction->update($validatedData);

            return response()->json($transaction);
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

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted']);
    }
}
