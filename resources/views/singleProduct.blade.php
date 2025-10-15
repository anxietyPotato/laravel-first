@extends('layout')
@section('pagecontent')

    <div class="container py-5">
        <div class="card shadow-lg">
            <div class="row g-0">
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $product->image) }} " alt="Image" class="img-fluid rounded" style="max-width: 100px; " >
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h3 class="card-title text-success">{{ $product->name }}</h3>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p class="card-text"><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $product->amount }}</p>
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary">← Back to Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
