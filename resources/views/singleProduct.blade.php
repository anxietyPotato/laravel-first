@extends('layout')

@section('pagecontent')
    @if(session('error'))
        <div class="alert alert-danger text-center">
            <i class="bi bi-x-circle me-2"></i> {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success text-center">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-x-circle me-2"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


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
                    <div>
                        <form action="{{ route('shopingcart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="image" value="{{ $product->image }}">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
