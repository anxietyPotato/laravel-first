@extends('layout')

@section('pagecontent')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color: #b0c4de; /* Light Steel Blue */
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #6f42c1;
        }

        .form-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 2rem;
        }

        .form-card {
            background-color: #2d2d2d;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(111, 66, 193, 0.6);
            width: 100%;
            max-width: 550px;
        }

        .form-label {
            color: #d4c0f9;
            font-weight: 500;
        }

        .form-control {
            background-color: #1f1f1f;
            color: #ffffff;
            border: 1px solid #444;
        }

        .form-control:focus {
            background-color: #1f1f1f;
            color: #ffffff;
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.25);
        }

        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }

        .btn-primary:hover {
            background-color: #5a35a0;
            border-color: #5a35a0;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Centered Form -->
    <section class="form-section">
        <div class="form-card">
            <form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="mb-3">
                    <label for="productName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="productDesc" class="form-label">Description</label>
                    <textarea class="form-control" id="productDesc" name="description" rows="3" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" min="1" value="{{ $product->amount }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ $product->price }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary px-4 py-2">Submit Changes</button>
                </div>
            </form>
        </div>
    </section>
@endsection




