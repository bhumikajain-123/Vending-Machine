@extends('layouts.main')

@section('content')

<div class="container my-5">
    <h2 class="mb-4 fw-bold">Your Cart</h2>

    @php
        $cart = session('cart', []); 
        $grandTotal = 0;
    @endphp

    @if(empty($cart))
        <p>Your cart is empty!</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cart as $id => $item)
                    @php
                        $total = $item['price'] * $item['qty'];
                        $grandTotal += $total;
                    @endphp

                    <tr>
                        <td>{{ $item['name'] }}</td>

                        <td>₹{{ number_format($item['price']) }}</td>

                        <td>
                            <a href="{{ url('cart/decrease/'.$item['p_id']) }}" class="btn btn-sm btn-secondary">-</a>
                            <span class="mx-2">{{ $item['qty'] }}</span>
                            <a href="{{ url('cart/add/'.$item['p_id']) }}" class="btn btn-sm btn-success">+</a>
                        </td>

                        <td>₹{{ number_format($total) }}</td>

                        <td>
                            <a href="{{ url('cart/remove/'.$item['p_id']) }}" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                @endforeach

                <tr class="table-secondary">
                    <th colspan="3">Grand Total</th>
                    <th>₹{{ number_format($grandTotal) }}</th>
                    <th></th>
                </tr>
            </tbody>
        </table>

        <a href="{{ url('/checkout') }}" class="btn btn-success mt-3">Checkout</a>
    @endif
</div>

@endsection
