
@extends('layout')



@section('pagecontent')
    <div class="container py-5">
        <h2 class="text-center text-primary mb-4">🛍️ Product List</h2>

        @if($product->isEmpty())
            <div class="alert alert-warning text-center">No products available.</div>
        @else
            <div class="row">
                @foreach($product as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <p><strong>Price:</strong> €{{ number_format($item->price, 2) }}</p>
                                <p><strong>Amount:</strong> {{ $item->amount }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

