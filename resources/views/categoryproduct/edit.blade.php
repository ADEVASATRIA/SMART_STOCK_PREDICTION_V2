@extends('layouts.app')
  
@section('title', 'Edit Category Product')
  
@section('contents')
    <h1 class="mb-0">Edit Category Product</h1>
    <hr />
    <form action="{{ route('categoryproduct.update', $categoryproduct->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name_category_product</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $categoryproduct->name_category_product }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection