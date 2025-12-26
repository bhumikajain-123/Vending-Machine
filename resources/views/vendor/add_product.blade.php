@extends('layouts.pain')

@section('content')

{{-- Sweet Alert --}}
@if(session('success'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    title: 'Success!',
    text: '{{ session("success") }}',
    icon: 'success',
    confirmButtonText: 'OK'
});
</script>
@endif

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

            <div class="container mt-4">
                <div class="card shadow p-4">

                    <h3 class="mb-4">Add Product</h3>

                    <form method="post" action="#" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            {{-- LEFT part --}}
                            <div class="col-md-8">

                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control form-control-sm" name="vp_name" placeholder="Enter Name Of Product">
                                    @error('vp_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="number" class="form-control form-control-sm" name="vp_price" placeholder="Enter Price Of Product">
                                    @error('vp_price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Category</label>
                                    <input type="text" class="form-control form-control-sm" name="vp_category" placeholder="Enter Category Of Product">
                                    @error('vp_category') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Stock Quantity</label>
                                    <input type="number" class="form-control form-control-sm" name="vp_stock" placeholder="Enter Stock Of Product">
                                    @error('vp_stock') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label>Product Description</label>
                                    <textarea class="form-control form-control-sm" name="vp_description" placeholder="Fill product description here"></textarea>
                                    @error('vp_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <input type="submit" class="btn btn-primary" value="Add Product">

                            </div>

                            {{-- IMAGE SECTION --}}
                            <div class="col-md-4 text-center">

                                <img id="previewImg"
                                    src="https://i.postimg.cc/1tPGxrzQ/watch.png"
                                    style="width:180px;height:180px;border-radius:100%;object-fit:cover;"
                                />

                                <br><br>

                                <label class="btn btn-dark btn-sm">
                                    Choose Image
                                    <input type="file" name="vp_image" onchange="readURL(this)">
                                </label>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

{{-- Image Preview Script --}}
<script>
function readURL(input) {
    if(input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e){
            document.getElementById('previewImg').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection
