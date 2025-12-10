@extends('layouts.main')

@section('content')

<div class="container my-5">
    <h2 class="fw-bold mb-4">Checkout</h2>

    <form action="{{ route('checkout.placeorder') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-7">
                <div class="card p-4 shadow-sm">
                    <h4>Billing Details</h4>

                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                </div>
            </div>


            <!-- ORDER SUMMARY -->
            <div class="col-md-5">
                <div class="card p-4 shadow-sm">

                    <h4>Order Summary</h4>

                    @php $grandTotal = 0; @endphp

                    @foreach($products as $product)
                        @php 
                            $qty = $cart[$product->id];
                            $total = $product->price * $qty;
                            $grandTotal += $total;
                        @endphp

                        <p>{{ $product->name }} (x{{ $qty }}) - ₹{{ $total }}</p>
                    @endforeach

                    <h4>Total: ₹{{ $grandTotal }}</h4>

                    <button class="btn btn-primary w-100 mt-4">
                        Place Order
                    </button>

                </div>
            </div>

        </div>
    </form>
</div>

@endsection
