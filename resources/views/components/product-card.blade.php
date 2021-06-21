
<div class="card">
    <img src="{{ asset($product->images->first()->path) }}" alt="" class="card-img" max-height="500">
    <div class="card-body">
        <h4 class="card-title"><strong>${{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text"><strong>{{ $product->stock }} left</strong></p>
        @if(isset($cart))
            <p class="card-text">
                {{ $product->pivot->quantity }}
                in your cart (${{ $product->total }})
            </p>
            <form class="d-inline"
                  method="POST"
                  action="{{ route('products.carts.destroy', ['cart' => $cart->id,'product' => $product->id]) }}"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning">Remove from Cart</button>
            </form>
        @else
            <form class="d-inline"
                  method="POST"
                  action="{{ route('products.carts.store', ['product' => $product->id]) }}"
            >
                @csrf
                <button type="submit" class="btn btn-success">Add To Cart</button>
            </form>
        @endif

    </div>
</div>

