@extends('layout')

@section('pagecontent')
    <div class="container py-5">

        <h2 class="text-center mb-4 text-success">Add Product</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Add Product Form --}}
        <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price (€)</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Add Product</button>
        </form>

        <hr class="my-5">

        <h2 class="text-center mb-4 text-info">All Products</h2>

        <div class="table-container">
            <table class="table table-dark table-striped">
                <thead class="table-head">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Price (€)</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->description }}</td>
                        <td>{{ $p->amount }}</td>
                        <td>{{ $p->price }}</td>
                        <td><img src="{{ asset('storage/' . $p->image) }}" width="50" alt="Product"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <style>
        body {
            background: #111;
            color: #eee;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            background: #1a1a1add;
            backdrop-filter: blur(8px);
            padding: 25px;
            border-radius: 20px;
            max-width: 600px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.6);
            border-left: 5px solid #1abc9c;
        }

        label {
            font-weight: 500;
            color: #2ecc71;
        }

        .form-control {
            background: #222;
            color: #fff;
            border: 1px solid #1abc9c;
        }

        .form-control:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.3);
            background: #222;
            color: #fff;
        }

        .btn-submit {
            background-color: #1abc9c;
            color: #111;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #16a085;
            color: #fff;
        }

        .table-container {
            background: #222;
            padding: 20px;
            border-radius: 15px;
        }

        .table-head {
            background-color: #e74c3c;
            color: #fff;
        }

        .table tbody tr:hover {
            background-color: #1abc9c33;
        }

        .table td, .table th {
            vertical-align: middle;
        }
    </style>
@endsection
