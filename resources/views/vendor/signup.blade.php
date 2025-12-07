@extends('layouts.pain')

@section('content')

@if(session('success'))
    <div id="success-msg" style="background-color: #d4edda; color: #26608cff; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
        {{ session('success') }}
    </div>

    <script>
        // Hide the message after 3 seconds
        setTimeout(function() {
            var msg = document.getElementById('success-msg');
            if(msg) msg.style.display = 'none';
        }, 3000);
    </script>
@endif

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card p-4 shadow-sm">
                <h2 class="text-center mb-4 fw-bold">Register</h2>

                <form method="POST" action="{{ url('vendor/signup') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input value="{{ old('full_name') }}" type="text" class="form-control" name="full_name" id="name" placeholder="Enter your full name">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone & Email Row -->
                    <div class="row mb-3">

                        <!-- Phone Number -->
                        <div class="col-12 col-md-12 col-lg-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text">+91</span>
                                <input value="{{ old('phone') }}" type="tel" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                            </div>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="col-12 col-md-12 col-lg-6 mt-sm-3 mt-lg-0">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="Enter your email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" value="{{ old('password') }}" class="form-control" name="password" id="password" placeholder="Enter your password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="address" placeholder="Address">{{ old('address') }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary text-light form-control form-control-lg">Signup</button>

                    <!-- Login link -->
                    <p class="text-center mt-3">
                        Already have an account? <a href="{{ url('vendor/login') }}">Login Here</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
