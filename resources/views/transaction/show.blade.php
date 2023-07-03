@extends('layouts.app')
  
@section('title', 'Show Transaction')
  
@section('contents')
    <h1 class="mb-0">Detail Transaction</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">name_customer</label>
            <input type="text" name="name_customer" class="form-control" placeholder="name_customer" value="{{ $transaction->name_customer }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">name_product</label>
            <input type="text" name="name_product" class="form-control" placeholder="name_product" value="{{ $transaction->name_product }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">total</label>
            <input type="text" name="total" class="form-control" placeholder="total" value="{{ $transaction->total }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $transaction->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $transaction->updated_at }}" readonly>
        </div>
    </div>
@endsection