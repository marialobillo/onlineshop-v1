
<div class="card">
    <img src="{{ asset($product->images->first()->path) }}" alt="" class="card-img" max-height="500">
    <div class="card-body">
        <h4 class="card-title"><strong>${{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>{{ $product->stock }} left</strong></p>
    </div>
</div>

