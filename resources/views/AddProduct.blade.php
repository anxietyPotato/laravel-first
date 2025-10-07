
@extends('layout')



@section('pagecontent')
    <div class="container py-5">

        {{-- Form Container --}}
        <div class="form-container mx-auto mt-4">
            <h2 class="form-title">Add New Product</h2>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/admin/add-product" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="productName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="productName" name="name"
                           value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="productDesc" class="form-label">Description</label>
                    <textarea class="form-control" id="productDesc" name="description" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount"
                           min="1" value="{{ old('amount') }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price (€)</label>
                    <input type="number" class="form-control" id="price" name="price"
                           step="0.01" min="0" value="{{ old('price') }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-submit px-5">Add Product</button>
                </div>
            </form>
        </div>

        {{-- Existing Products --}}
        @if($products->count())
            <div class="mt-5 p-4 table-container rounded shadow">
                <h4 class="mb-4 text-center text-light">Existing Products</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle text-light">
                        <thead class="table-head">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Price</th>
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
                                <td>€{{ number_format($p->price, 2) }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$p->image) }}"
                                         alt="Image" width="80"
                                         style="object-fit:cover; border-radius:8px;">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>

    <style>
        body {
            background: #111; /* deep black */
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
            border-left: 5px solid #1abc9c; /* turquoise accent */
        }

        .form-title {
            font-weight: bold;
            color: #e74c3c; /* red title */
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: 500;
            color: #2ecc71; /* bright green */
        }

        .form-control {
            background: #222;
            color: #fff;
            border: 1px solid #1abc9c;
        }

        .form-control:focus {
            border-color: #e74c3c; /* red border on focus */
            box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.3);
            background: #222;
            color: #fff;
        }

        .btn-submit {
            background-color: #1abc9c; /* turquoise */
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
            background-color: #e74c3c; /* red */
            color: #fff;
        }

        .table tbody tr:hover {
            background-color: #1abc9c33; /* turquoise hover */
        }

        .table td, .table th {
            vertical-align: middle;
        }
    </style>
@endsection
