@extends('layouts.app')

@section('content')
   <h2>{{ $product->title }}</h2>
   <p>{{ $product->subtitle }}</p>
   <p>{{ $product->price_in_dollars }}</p>

   <p><img src="{{ $product->image }}" alt="product-image">
        {{ $product->image }}
    </p>
   
    <p>{{ $product->stock }}</p>

@endsection


