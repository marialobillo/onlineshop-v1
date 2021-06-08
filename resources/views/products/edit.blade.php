@extends('layouts.master')

@section('content')
    <h1>Create a Product</h1>

    <form action="{{ route('products.update', ['productId' => $product->id])  }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control"
                       value="{{ old('title') ?? $product->title }}"
                       required>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control"
                       value="{{ old('description') ?? $product->description }}"
                       required>
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" min="1.00" step="0.01"
                       value="{{ old('price') ?? $product->price }}"
                       class="form-control" required>
            </div>

            <div class="form-group">
                <label for="">Stock</label>
                <input type="number" name="stock" class="form-control"
                       value="{{ old('stock') ?? $product->stock }}"
                       required>
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Select...</option>
                    <option {{ old('status') == 'available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }}
                            value="available">Available</option>
                    <option {{ old('status') == 'unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '') }}
                            value="unavailable">Unavailable</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    Edit Product</button>
            </div>
        </div>
    </form>

@endsection
