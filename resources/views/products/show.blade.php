@extends('layouts.app')
  
@section('title', 'Show Product')
  
@section('contents')
    <h1 class="mb-0">Detail Product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">name</label>
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ $product->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">price</label>
            <input type="text" name="price" class="form-control" placeholder="price" value="{{ $product->price }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">stock</label>
            <input type="text" name="stock" class="form-control" placeholder="stock" value="{{ $product->stock }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">category_id</label>
            <input type="text" name="category_id" class="form-control" placeholder="category_id" value="{{ $product->category_id }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $product->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $product->updated_at }}" readonly>
        </div>
    </div>
@endsection