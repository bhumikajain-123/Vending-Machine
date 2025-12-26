@extends('layouts.pain')

@section('content')

<!-- Success Message -->
@if(session('success'))
    <div id="success-msg" class="container mt-3">
        <div class="alert alert-success text-center rounded-3">
            {{ session('success') }}
        </div>
    </div>

    <script>
        setTimeout(function() {
            var msg = document.getElementById('success-msg');
            if(msg) msg.style.display = 'none';
        }, 3000);
    </script>
@endif

<!-- Background -->
<div style="background:#8fd3f4; min-height:100vh; padding-top:60px;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">

                <!-- Card -->
                <div class="card p-4 shadow-lg border-0 rounded-4">

                    <!-- Heading -->
                    <h3 class="text-center fw-bold mb-1" style="color:#ff9800;">
                        Snack Corner
                    </h3>
                    <p class="text-center text-muted mb-4">
                        Vendor Registration
                    </p>

                    <form method="POST" action="{{ url('vendor/signup') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text"
                                   name="full_name"
                                   value="{{ old('full_name') }}"
                                   class="form-control rounded-3"
                                   placeholder="Enter your full name">
                            @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Phone & Email -->
                        <div class="row mb-3">

                            <!-- Phone -->
                            <div class="col-lg-6 mb-3 mb-lg-0">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">+91</span>
                                    <input type="tel"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           class="form-control"
                                           placeholder="Phone number">
                                </div>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-lg-6">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="form-control rounded-3"
                                       placeholder="Enter your email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control rounded-3"
                                   placeholder="Create your password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Address</label>
                            <textarea name="address"
                                      class="form-control rounded-3"
                                      rows="3"
                                      placeholder="Enter your address">{{ old('address') }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Signup Button -->
                        <button type="submit"
                                class="btn w-100 text-white fw-bold rounded-3 py-2"
                                style="background:#2196f3;">
                            Sign Up
                        </button>

                        <!-- Login Link -->
                        <p class="text-center mt-3 mb-0">
                            Already have an account?
                            <a href="{{ url('vendor/login') }}"
                               class="fw-semibold text-decoration-none"
                               style="color:#ff9800;">
                                Login Here
                            </a>
                        </p>

                    </form>
                </div>
                <!-- Card End -->

            </div>
        </div>
    </div>

</div>

@endsection
