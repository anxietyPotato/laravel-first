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
@endforeach
