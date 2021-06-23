
<div class="card">
    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" >
                    <img src="{{ asset($image->path) }}"
                         class="d-block w-100 card-image-top" height="300">
                </div>
            @endforeach
        </div>
        <a href="#carousel{{ $product->id }}" class="carousel-control-prev"
           role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="#carousel{{ $product->id }}" class="carousel-control-next"
           role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
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
                  action="{{ route('products.carts.destroy',
                        ['cart' => $cart->id,'product' => $product->id]) }}"
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

