@extends('layouts.pain')

@section('content')

<!-- SweetAlert for flash messages -->
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

            <!-- View Categories Table -->
            <div class="container mt-4">
                <div class="card shadow p-4">
                    <h3 class="mb-4">View Categories</h3>

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Sr No</th>
                                <th>Category Name</th>
                                <th>Commission (%)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sr = 1; @endphp
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $sr++ }}</td>
                                    <td>{{ $category->p_name }}</td>
                                    <td>{{ $category->p_comission }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ url('admin/edit_category/'.$category->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <!-- Delete Button with SweetAlert and Form -->
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.delete_category', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $category->id }})">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if($categories->count() == 0)
                                <tr>
                                    <td colspan="4" class="text-center">No categories found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- SweetAlert Delete Confirmation Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This category will be deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form with DELETE method
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

@endsection
