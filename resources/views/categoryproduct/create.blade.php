@extends('layouts.app')
  
@section('title', 'Create Category Product')
  
@section('contents')
    <h1 class="mb-0">Add Category Product</h1>
    <hr />
    <form action="{{ route('categoryproduct.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name category product" class="form-control" placeholder="name_category_product">
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection