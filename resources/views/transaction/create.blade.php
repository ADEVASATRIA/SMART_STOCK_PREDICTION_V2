@extends('layouts.app')
  
@section('title', 'Create Transaction')
  
@section('contents')
    <h1 class="mb-0">Add Transaction</h1>
    <hr />
    <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name_customer" class="form-control" placeholder="name_customer">
            </div>
            <div class="col">
                <input type="text" name="name_product" class="form-control" placeholder="name_product">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="total" class="form-control" placeholder="total">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection