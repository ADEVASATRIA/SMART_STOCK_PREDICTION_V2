@extends('layouts.app')
  
@section('title', 'Edit Transaction')
  
@section('contents')
    <h1 class="mb-0">Edit Transaction</h1>
    <hr />
    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name_customer</label>
                <input type="text" name="name_customer" class="form-control" placeholder="name_customer" value="{{ $transaction->name_customer }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">name_product</label>
                <input type="text" name="name_product" class="form-control" placeholder="name_product" value="{{ $transaction->name_product }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">total</label>
                <input type="text" name="total" class="form-control" placeholder="total" value="{{ $transaction->total }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection