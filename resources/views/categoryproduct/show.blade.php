@extends('layouts.app')
  
@section('title', 'Show category product')
  
@section('contents')
    <h1 class="mb-0">Detail category product</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">name category product</label>
            <input type="text" name="name_category_product" class="form-control" placeholder="name_category_product" value="{{ $categoryproduct->name_category_product }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $categoryproduct->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $categoryproduct->updated_at }}" readonly>
        </div>
    </div>
@endsection