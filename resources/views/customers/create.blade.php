@extends('layouts.app')
  
@section('title', 'Create Customer')
  
@section('contents')
    <h1 class="mb-0">Add Customer</h1>
    <hr />
    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="email">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="phone_number" class="form-control" placeholder="phone_number">
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection