@extends('layouts.app')
  
@section('title', 'Show Customer')
  
@section('contents')
    <h1 class="mb-0">Detail Customer</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">name</label>
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ $customer->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="Email" class="form-control" placeholder="Email" value="{{ $customer->Email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Phone_number</label>
            <input type="text" name="Phone_number" class="form-control" placeholder="Phone_number" value="{{ $customer->Phone_number }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $customer->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $customer->updated_at }}" readonly>
        </div>
    </div>
@endsection