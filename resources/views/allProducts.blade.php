@extends('layout')
@section('pagecontent')
    <div class="container py-5">
        <h2 class="text-center mb-4 text-primary">All Products</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if($products->isEmpty())
            <div class="alert alert-warning text-center">No products found.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Price (€)</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->amount }}</td>
                            <td>€{{ number_format($p->price, 2) }}</td>
                           <td> <img src="{{ asset('storage/' . $p->image) }} " alt="Image" class="img-fluid rounded" style="max-width: 100px; " ></td>
                            <td>
                                <a href="{{ route('product.single', $p->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('delete.product', $p->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
