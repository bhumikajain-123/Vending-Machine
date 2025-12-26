@extends('layouts.pain')

@section('content')
<div class="container-fluid g-0">

    {{-- Sidebar --}}
    <div class="sidebar">
        <x-side-bar-vendor />
    </div>

    {{-- Main Content --}}
    <div class="main-content">

        <!-- Top Navbar -->
        <nav class="navbar navbar-dark bg-dark px-4">
            <span class="navbar-brand fw-bold">VENDOMART</span>
            <span class="text-light">
                <i class="bi bi-person-circle"></i>
                {{ session('name') }}
            </span>
        </nav>

        <!-- Summary Cards -->
        <div class="row mt-4 text-center g-3">
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h6 class="text-muted">Total Products</h6>
                        <h2 class="fw-bold text-primary">{{ $totalProducts }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h6 class="text-muted">Low Stock</h6>
                        <h2 class="fw-bold text-warning">{{ $lowStock }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h6 class="text-muted">Out of Stock</h6>
                        <h2 class="fw-bold text-danger">{{ $outOfStock }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Status Overview & Recently Added Products -->
        <div class="row mt-3 g-3">
            <div class="col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-header bg-dark text-light">Product Status Overview</div>
                    <div class="card-body">
                        <p>🟢 In Stock: <strong>{{ $inStock }}</strong></p>
                        <p>🟡 Low Stock: <strong>{{ $lowStock }}</strong></p>
                        <p>🔴 Out of Stock: <strong>{{ $outOfStock }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-header bg-dark text-light">Recently Added Products</div>
                    <div class="card-body p-0 table-responsive">
                        <table class="table table-striped mb-0 text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProducts as $product)
                                <tr>
                                    <td>{{ $product->p_name }}</td>
                                    <td>₹ {{ $product->p_price }}</td>
                                    <td>
                                        @if($product->p_stock > 5)
                                            <span class="badge bg-success">In Stock</span>
                                        @elseif($product->p_stock > 0)
                                            <span class="badge bg-warning">Low</span>
                                        @else
                                            <span class="badge bg-danger">Out</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">No products found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Main Content -->

</div>
@endsection
