@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center">Products</h1>

        @empty($products)
            <div class="alert alert-warning">
                The list of products is empty.
            </div>
        @else


        <div class="table-responsive">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        @endempty

    </div>
@endsection
