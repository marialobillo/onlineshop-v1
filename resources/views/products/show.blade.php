@extends('layouts.app')

@section('content')
   <h2>{{ $product->title }}</h2>
   <p>{{ $product->subtitle }}</p>
   <p>{{ number_format($product->product_price / 100, 2) }}</p>
   <p><img src="{{ $product->image }}" alt="">
        {{ $product->image }}
    </p>
   <p>{{ $product->stock }}</p>
    @endsection


