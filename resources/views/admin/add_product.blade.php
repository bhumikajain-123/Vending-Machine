@extends('layouts.pain')

@section('content')

<!-- SweetAlert for success message -->
@if(session('mssg'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session("mssg") }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <x-side-bar-admin />
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <nav class="navbar navbar-dark bg-dark px-4">
                <a class="navbar-brand" href="#">VENDOMART</a>
                <span class="text-light">Logged in : admin</span>
            </nav>

            <!-- Add Category Form -->
            <div class="container mt-4">
                <div class="card shadow p-4">
                    <h3 class="mb-4">Add Category</h3>

                    <form method="post" action="{{ url('admin/add_category') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="p_name" class="form-label">Category Name</label>
                            <input type="text" id="p_name" name="p_name" class="form-control" placeholder="Enter category name">
                            @error('p_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="p_comission" class="form-label">Commission (%)</label>
                            <input type="number" id="p_comission" name="p_comission" class="form-control" placeholder="Enter commission percentage">
                            @error('p_comission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add Category">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
