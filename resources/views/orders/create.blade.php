@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Products</h1>

        <a class="btn btn-success mb-2" href="{{ route('products.create') }}">Create new Product</a>

            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Options</th>
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
                                    {{ $product->pivot->quantity * $product->price }}
                                </strong>
                            </td>
                            <td>

                                <form
                                    class="d-inline"
                                    action="{{ route('products.destroy', ['product' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

    </div>
@endsection
