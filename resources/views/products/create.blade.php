@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="price">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="stock" class="form-control" placeholder="Product stock">
            </div>
            <div class="col">
                <input type="text" name="category_id" class="form-control" placeholder="category_id">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection