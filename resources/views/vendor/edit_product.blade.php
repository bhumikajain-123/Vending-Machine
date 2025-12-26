@extends('layouts.pain')

@section('content')

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

<div class="container mt-4">

    <div class="card shadow p-4">

        <h3 class="mb-4">Edit Product</h3>

        <form action="{{ route('vendor.product.update', $product->p_id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            {{-- NOTE: do NOT add @method('PUT') because route is POST --}}

            <div class="row">

                <div class="col-md-8">

                    <label>Product Name</label>
                    <input type="text" name="vp_name"
                           value="{{ $product->p_name }}"
                           class="form-control form-control-sm">
                    @error('vp_name') <span class="text-danger">{{ $message }}</span> @enderror
                    <br>

                    <label>Price</label>
                    <input type="number" name="vp_price"
                           value="{{ $product->p_price }}"
                           class="form-control form-control-sm">
                    @error('vp_price') <span class="text-danger">{{ $message }}</span> @enderror
                    <br>

                    <label>Category</label>
                    <input type ="text" name="vp_category"  value="{{ $product->p_name }}" class="form-control form-control-sm">
                        
                    @error('vp_category') <span class="text-danger">{{ $message }}</span> @enderror
                    <br>

                    <label>Stock</label>
                    <input type="number" name="vp_stock"
                           value="{{ $product->p_stock }}"
                           class="form-control form-control-sm">
                    @error('vp_stock') <span class="text-danger">{{ $message }}</span> @enderror
                    <br>

                    <label>Description</label>
                    <textarea name="vp_description"
                              class="form-control form-control-sm">{{ $product->p_description }}</textarea>
                    @error('vp_description') <span class="text-danger">{{ $message }}</span> @enderror
                    <br>

                    <input type="submit" class="btn btn-success" value="Update">

                    {{-- Delete Button --}}
                    <button type="button" class="btn btn-danger" onclick="deleteProduct({{ $product->p_id }})">
                        Delete Product
                    </button>

                </div>

                <div class="col-md-4 text-center">

                    <img id="previewImg"
                         src="{{ asset('uploads/vendor/'.$product->p_image) }}"
                         style="width:180px;height:180px;border-radius:100%;object-fit:cover;">
                    <br><br>

                    <label class="btn btn-dark btn-sm">
                        Change Image
                        <input type="file" value = "p_image"  name="vp_image" onchange="readURL(this)">
                    </label>

                </div>

            </div>

        </form>

    </div>
</div>

{{-- Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function readURL(input){
    if(input.files && input.files[0]){
        let reader = new FileReader();
        reader.onload = function(e){
            document.getElementById('previewImg').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// SweetAlert Delete
function deleteProduct(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the product!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if(result.isConfirmed){
            window.location.href = '/vendor/delete_product/' + id;
        }
    })
}
</script>

@endsection
