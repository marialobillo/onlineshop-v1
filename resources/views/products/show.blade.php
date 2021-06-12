@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->title  }} ({{ $product->id  }})</h1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price  }}</p>
        <p>{{ $product->stock }}</p>
    </div>
    @endsection


