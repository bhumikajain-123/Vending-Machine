@extends('layouts.main')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card p-4 shadow-sm">
                <h2 class="text-center mb-4 fw-bold">Login</h2>

                <form>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>

                    <!-- Remember me -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <!-- Register link -->
                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ url('register') }}">Register Here</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
