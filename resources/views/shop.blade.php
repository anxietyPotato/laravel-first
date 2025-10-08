@extends('layout')

@section('pagecontent')
    <div class="container py-5 bg-light min-vh-100">

        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6 text-success">
                🛍️ Welcome to Our Shop
            </h2>
            <p class="text-muted">
                Discover our latest products — vibrant, affordable, and ready for you!
            </p>
        </div>

        @if($product->isEmpty())
            <div class="alert alert-warning text-center shadow-sm">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                No products available.
            </div>
        @else
            <div class="row g-4 justify-content-center">
                @foreach($product as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-lg bg-white">
                            <div class="card-body text-center p-4">

                                <!-- Product Name -->
                                <h5 class="card-title fw-bold text-success mb-2">
                                    {{ $item->name }}
                                </h5>

                                <!-- Description -->
                                <p class="card-text text-secondary mb-3">
                                    {{ Str::limit($item->description, 100, '...') }}
                                </p>

                                <!-- Price & Stock -->
                                <p class="mb-1">
                                    <span class="fw-bold text-dark">💶 Price:</span>
                                    <span class="text-success fw-semibold">€{{ number_format($item->price, 2) }}</span>
                                </p>
                                <p class="mb-4">
                                    <span class="fw-bold text-dark">📦 Stock:</span>
                                    <span class="text-danger fw-semibold">{{ $item->amount }}</span>
                                </p>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-success btn-sm">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </a>
                                    <a href="#" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-info-circle"></i> Details
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

