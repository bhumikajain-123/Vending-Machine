@extends('layouts.pain')

@section('content')



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card p-4 shadow-sm">
                <h2 class="text-center mb-4 fw-bold">Login</h2>
                @if(session('error'))
   <div id="success-msg" style="background-color: #a9795fff; color: white; padding: 10px; margin-bottom: 10px; border-radius: 5px;">

    {{ session('error') }}

    <script>
        
        // setTimeout(() => {
        //     var messg = document.getElementById('error-mess');
        //     if (messg) {
        //         messg.style.display = 'none';
        //     }
        // }, 3000);
    </script>
</div>
@endif

                <form method="POST" action="{{ url('vendor/login') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email') }}" placeholder="Enter your email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter your password">
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <p class="text-center mt-3">
                        Don't have an account? <a href="{{ url('vendor/signup') }}">Sign-up</a>
                    </p>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
