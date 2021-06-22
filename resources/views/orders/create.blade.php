@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Details</h2>

        <h4 class="text-center">Total: <strong>${{ $cart->total }}</strong></h4>

        <div class="text-center mb-3">
            <form class="d-inline"
                  method="POST"
                  action="{{ route('orders.store') }}"
            >
                @csrf
                <button type="submit" class="btn btn-success">Confirm Order</button>
            </form>
        </div>


            <div class="table-responsive">
                <table class="table table-stripped table-secondary">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->products as $product)
                        <tr>
                            <td>
                                <img width="60" src="{{ asset($product->images()->first()->path) }}" alt="">
                                {{ $product->title }}
                            </td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <strong>
                                    ${{ $product->total }}
                                </strong>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

    </div>
@endsection
