@extends('layouts.pain')

@section('content')



<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
             <x-sidebar/>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <nav class="navbar navbar-dark bg-dark px-4">
                <a class="navbar-brand" href="#">VENDOMART</a>
                <span class="text-light">Logged in : {{ session('name') }}</span>
            </nav>
        

            <!-- Dashboard Cards -->
            <div class="row text-center mb-4 mt-4">
                <div class="col-md-4">
                    <div class="card card-custom card-orders">
                        <h3>Total Orders</h3>
                        <h1>15</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom card-sales">
                        <h3>Total Sale</h3>
                        <h1>₹ 14,499.00</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom card-pending">
                        <h3>Pending Orders</h3>
                        <h1>5</h1>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <h4>Recent Orders</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table-dark">
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>25-12-2024</td>
                        <td>₹ 4,599</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>25-12-2024</td>
                        <td>₹ 4,599</td>
                        <td><span class="badge bg-info">On Hold</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>25-12-2024</td>
                        <td>₹ 4,599</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection