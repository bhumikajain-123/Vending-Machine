@extends('layouts.main')

@push('title')
<title>Home</title>
@endpush()

@section('content')

<section class="my-5">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <h1>Top Deals</h1>
            </div>
            <div class="col-lg-6 text-end">
                <button class="btn btn-success">View All</button>
            </div>

            @foreach($products as $product)
            <div class="col-lg-3 mt-3">
                <div class="card">
                    <img src="{{ $product->p_image }}" class="card-img-top" alt="product">

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->p_name }}</h5>
                        <p class="card-text text-muted">{{ $product->p_description }}</p>
                        <h5 class="fw-bold text-success">₹{{ $product->p_price }}</h5>

         <a href="{{ url('cart/add/'.$product->p_id) }}" class="btn btn-primary mt-2">
    Buy Now
</a>




                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

@endsection