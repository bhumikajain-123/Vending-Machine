@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush()

@section('content')

<!-- ===================== CAROUSEL ===================== -->
<!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="{{ asset('images/watch.png') }}" class="d-block w-100" alt="watch">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/shoes.png') }}" class="d-block w-100" alt="shoes">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/ear_phones.png') }}" class="d-block w-100" alt="earphones">
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> -->


<!-- ===================== Product Section === ================== -->
<!-- ===================== Product Section === ================== -->
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
                    <img src="{{ $product->image }}" class="card-img-top" alt="product">

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <h5 class="fw-bold text-success">₹{{ $product->price }}</h5>

                        <a href="{{ url('cart/add/'.$product->id) }}" class="btn btn-primary mt-2">Buy Now</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection