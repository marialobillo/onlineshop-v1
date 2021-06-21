@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Your Cart</h1>

        @if($cart->products->isEmpty())
            <div class="alert alert-warning">
                Your Cart is Empty. Add some products.
            </div>
        @else
            <div class="row">
                @foreach($cart->products as $product)
                    <div class="col-3">
                        @include('components.product-card')
                    </div>
                @endforeach
            </div>
        @endempty

    </div>
@endsection
