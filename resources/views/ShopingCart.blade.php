@extends('layout')


@section('pagecontent')
    <div class="container my-5">
        <h2 class="text-center mb-4">🛒 Your Shopping Cart</h2>

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

        <div class="row">
            @foreach($items as $id => $item)
                @php
                    $product = \App\Models\ProductModel::find($id);
                    $isMaxedOut = $item['quantity'] >= $product->amount;
                @endphp
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $item['image']) }}" class="card-img-top" alt="{{ $item['name'] }}" style="object-fit: cover; height: 200px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item['name'] }}</h5>
                            <p class="card-text mb-2">€{{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</p>

                            <div class="d-flex align-items-center mb-2">
                                <form action="{{ route('shopingcart.update', $id) }}" method="POST" class="me-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="decrease">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm">−</button>
                                </form>

                                <span class="px-2">{{ $item['quantity'] }}</span>

                                <form action="{{ route('shopingcart.update', $id) }}" method="POST" class="ms-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="increase">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm" @if($isMaxedOut) disabled @endif>+</button>
                                </form>
                            </div>

                            @if($isMaxedOut)
                                <div class="text-danger small mb-2">
                                    <i class="bi bi-exclamation-circle me-1"></i>
                                    Max stock reached ({{ $product->amount }} available)
                                </div>
                            @endif

                            <form action="{{ route('shopingcart.remove', $id) }}" method="POST" class="mt-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger w-100">
                                    <i class="bi bi-trash me-1"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(count($items))
            <div class="text-center mb-3">
                <h4>Total to pay: <strong>€{{ number_format($total, 2) }}</strong></h4>
            </div>

            <form action="{{ route('shopingcart.checkout') }}" method="POST" class="text-center mt-2">
                @csrf
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="bi bi-credit-card me-1"></i> Checkout & Submit Order
                </button>
            </form>

        @else
            <div class="alert alert-info text-center">
                Your cart is empty! 🛒
            </div>
        @endif
    </div>
@endsection
