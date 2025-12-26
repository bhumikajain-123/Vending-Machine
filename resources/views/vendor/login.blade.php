@extends('layouts.pain')

@section('content')

<div style="background:#8fd3f4; min-height:100vh; padding-top:60px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <div class="card shadow-lg border-0 rounded-4 p-4">
                    
                    <!-- Heading -->
                    <h3 class="text-center fw-bold mb-1" style="color:#ff9800;">
                        Snack Corner
                    </h3>
                    <p class="text-center text-muted mb-4">
                        Vendor Login
                    </p>

                    <!-- Error Message -->
                    @if(session('error'))
                        <div class="alert alert-danger text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('vendor/login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control rounded-3"
                                   placeholder="Enter your email"
                                   value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" 
                                   name="password" 
                                   class="form-control rounded-3"
                                   placeholder="Enter your password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Login Button -->
                        <button type="submit" 
                                class="btn w-100 text-white fw-bold rounded-3"
                                style="background:#2196f3;">
                            Login
                        </button>

                        <!-- Signup -->
                        <p class="text-center mt-3">
                            Don’t have an account?
                            <a href="{{ url('vendor/signup') }}" 
                               class="fw-semibold text-decoration-none"
                               style="color:#ff9800;">
                                Sign Up
                            </a>
                        </p>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
