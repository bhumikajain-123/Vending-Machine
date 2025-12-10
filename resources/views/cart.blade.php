@extends('layouts.main')

@section('content')

<div class="container my-5">
    <h2 class="mb-4 fw-bold">Your Cart</h2>

    @php
        // Get cart from session
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
                @foreach($cart as $id => $qty)
                    @php
                        $product = \App\Models\UserProduct::find($id); // Make sure your model is correct
                    @endphp

                    @if($product)
                        @php
                            $total = $product->price * $qty;
                            $grandTotal += $total;
                        @endphp

                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>₹{{ number_format($product->price) }}</td>
                            <td>{{ $qty }}</td>
                            <td>₹{{ number_format($total) }}</td>
                            <td>
                                <a href="{{ url('cart/remove/'.$product->id) }}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                    @endif
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
