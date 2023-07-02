@extends('layouts.app')
  
@section('title', 'Edit Customer')
  
@section('contents')
    <h1 class="mb-0">Edit Customer</h1>
    <hr />
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $customer->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">email</label>
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ $customer->email }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Phone number</label>
                <input type="text" name="phone_number" class="form-control" placeholder="phone_number Code" value="{{ $customer->phone_number }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">User id</label>
                <input type="text" name="user_id" class="form-control" placeholder="user_id" value="{{ $customer->user_id }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection