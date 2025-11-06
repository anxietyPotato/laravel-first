
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

@foreach($items as $id => $item)
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between">
            <div>
                <h5>{{ $item['name'] }}</h5>
                <p>€{{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</p>
            </div>
            <img src="{{ asset('storage/' . $item['image']) }}" style="max-width: 60px;">
        </div>
    </div>
    <form action="{{ route('shopingcart.update', $id) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <input type="hidden" name="action" value="decrease">
        <button type="submit" class="btn btn-outline-secondary btn-sm">−</button>
    </form>

    <span class="px-2">{{ $item['quantity'] }}</span>

    <form action="{{ route('shopingcart.update', $id) }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <input type="hidden" name="action" value="increase">
        <button type="submit" class="btn btn-outline-secondary btn-sm">+</button>
    </form>
    <form action="{{ route('shopingcart.remove', $id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="bi bi-trash"></i> Remove
        </button>
    </form>

    <form action="{{ route('shopingcart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary w-100 mt-4">
            <i class="bi bi-credit-card"></i> Checkout & Submit Order
        </button>
    </form>
@endforeach

