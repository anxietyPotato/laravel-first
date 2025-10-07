@extends('layout')



@section('pagecontent')
    <h2 class="text-center mb-4">🛒 Product List</h2>

    @if($products->isEmpty())
        <div class="alert alert-warning text-center">No products found.</div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <p><strong>Price:</strong> €{{ number_format($product->price, 2) }}</p>
                            <p><strong>Amount:</strong> {{ $product->amount }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('Delete.products', ['products' => $product->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{ route('product.single',['product' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
