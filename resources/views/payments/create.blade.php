@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Payment Details</h2>

        <h4 class="text-center">Total: <strong>${{ $order->total }}</strong></h4>

        <div class="text-center mb-3">
            <form class="d-inline"
                  method="POST"
                  action="{{ route('orders.payments.store', ['order' => $order->id]) }}"
            >
                @csrf
                <button type="submit" class="btn btn-success">Pay</button>
            </form>
        </div>

    </div>
@endsection
