@extends('layout') <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2980b9, #8e44ad, #27ae60);
            background-size: 200% 200%;
            animation: gradientMove 15s ease infinite;
            font-family: 'Segoe UI', sans-serif;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .form-container {
            background: #ffffffdd;
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            max-width: 550px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .form-title {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            font-weight: 500;
            color: #34495e;
        }

        .form-control:focus {
            border-color: #2ecc71;
            box-shadow: 0 0 0 0.2rem rgba(46, 204, 113, 0.25);
        }

        .btn-primary {
            background-color: #2ecc71;
            border: none;
        }

        .btn-primary:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>

<div class="form-container">


    <h2 class="form-title">Add New Product</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif


    <form action="/admin/add-product" method="POST">

        @if($errors->any())
            <p>mistake : {{$errors-> first() }}</p>
        @endif
    {{csrf_field()}}
        <div class="mb-3">
            <label for="productName" class="form-label">Name</label>
            <input type="text" class="form-control" id="productName" name="name" required>
        </div>


        <div class="mb-3">
            <label for="productDesc" class="form-label">Description</label>
            <textarea class="form-control" id="productDesc" name="description" required></textarea>
        </div>


        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" min="1" required>
        </div>


        <div class="mb-3">
            <label for="price" class="form-label">Price </label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Image </label>
            <input type="url" class="form-control" id="image" name="image" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-5">Add Product</button>
        </div>
    </form>
</div>



@if($products->count())
    <div class="mt-5 p-4 bg-white rounded shadow">
        <h4 class="mb-4 text-center">Existing Products</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center align-middle">
                <thead class="table-dark">
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
                        <td>${{ number_format($p->price, 2) }}</td>
                        <td><img src="{{ $p->image }}" alt="Image" width="80" style="object-fit:cover; border-radius:8px;"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif


