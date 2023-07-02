@extends('layouts.app')
  
@section('title', 'Home Category Product')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Category Product</h1>
        <a href="{{ route('categoryproduct.create') }}" class="btn btn-primary">Add Category Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>name category product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($categoryproduct->count() > 0)
                @foreach($categoryproduct as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name_category_product }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('categoryproduct.show', $rs->id_category_product) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('categoryproduct.edit', $rs->id_category_product)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('categoryproduct.destroy', $rs->id_category_product) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">category product not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection