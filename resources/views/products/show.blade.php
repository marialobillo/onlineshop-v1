@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>{{ $product->title  }} ({{ $product->id  }})</h1>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price  }}</p>
    </div>
    @endsection


