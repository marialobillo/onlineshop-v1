@extends('layouts.app')

@section('content')
    <h1>Create a Product</h1>

    <form action="{{ route('products.store')  }}" method="POST">
        @csrf
        <div class="form-row">

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title"
                       class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description"
                       class="form-control" value="{{ old('description') }}" required>
            </div>

            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" min="1.00" step="0.01"
                       class="form-control" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="">Stock</label>
                <input type="number" name="stock"
                       class="form-control" value="{{ old('stock') }}" required>
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">Select...</option>
                    <option {{ old('status') == 'available' ? 'selected': '' }}
                            value="available">Available</option>
                    <option {{ old('status') == 'unavailable' ? 'selected' : '' }}
                            value="unavailable">Unavailable</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    Create Product</button>
            </div>
        </div>
    </form>

@endsection
