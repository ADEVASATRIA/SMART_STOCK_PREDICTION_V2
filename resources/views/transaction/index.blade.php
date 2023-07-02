@extends('layouts.app')
  
@section('title', 'Home Transaction')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Transaction</h1>
        <a href="{{ route('transaction.create') }}" class="btn btn-primary">Add Transaction</a>
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
                <th>name_customer</th>
                <th>name_product</th>
                <th>total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($transaction->count() > 0)
                @foreach($transaction as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name_customer }}</td>
                        <td class="align-middle">{{ $rs->name_product }}</td>
                        <td class="align-middle">{{ $rs->total }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('transaction.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('transaction.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('transaction.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">Transaction not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection