@extends('layouts.pain')

@section('content')

<style>
.profile-img{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #ddd;
}
.section-title{
    font-weight:600;
    font-size:18px;
    margin:20px 0 10px;
}
</style>

<div class="container-fluid">
    <div class="row">

        {{-- Sidebar --}}
        <div class="col-md-2">
            <x-side-bar-vendor />
        </div>

        <div class="col-md-10">

            {{-- Success / Error Messages --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="container">
                <form action="{{ route('vendor.update_profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Heading --}}
                    <h3 class="mb-4 mt-2">Basic Information</h3>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>ID Number</label>
                            <input type="text" name="id_number" class="form-control"
                                value="{{ old('id_number', $vendor->id_number) }}">
                            @error('id_number')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Business Name</label>
                            <input type="text" name="business_name" class="form-control"
                                value="{{ old('business_name', $vendor->business_name) }}">
                            @error('business_name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Full Name</label>
                            <input type="text" name="full_name" class="form-control"
                                value="{{ old('full_name', $vendor->full_name) }}">
                            @error('full_name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" readonly
                                value="{{ $vendor->email }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" readonly
                                value="{{ $vendor->phone }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control">{{ old('address', $vendor->address) }}</textarea>
                            @error('address')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <hr>
                    <p class="section-title">Business Information</p>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Business Type</label>
                            <select name="business_type" class="form-select">
                                <option value="">Select</option>
                                <option value="Private Limited" {{ $vendor->business_type=='Private Limited' ? 'selected':'' }}>Private Limited</option>
                                <option value="Partnership" {{ $vendor->business_type=='Partnership' ? 'selected':'' }}>Partnership</option>
                                <option value="Sole Proprietor" {{ $vendor->business_type=='Sole Proprietor' ? 'selected':'' }}>Sole Proprietor</option>
                            </select>
                            @error('business_type')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>GST Number</label>
                            <input type="text" name="gst_number" class="form-control"
                                value="{{ old('gst_number', $vendor->gst_number) }}">
                            @error('gst_number')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Business Category</label>
                            <input type="text" name="business_category" class="form-control"
                                value="{{ old('business_category', $vendor->business_category) }}">
                            @error('business_category')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    <p class="section-title">Payment Information</p>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Bank Account No</label>
                            <input type="text" name="bank_account_no" class="form-control"
                                value="{{ old('bank_account_no', $vendor->bank_account_no) }}">
                            @error('bank_account_no')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Payment Method</label>
                            <input type="text" name="payment_method" class="form-control"
                                value="{{ old('payment_method', $vendor->payment_method) }}">
                            @error('payment_method')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                    </div>

                    {{-- IMAGE --}}
                    <div class="text-center mt-4">
                        <img src="{{ asset('vendor_img/'.$vendor->image) }}" class="profile-img" id="previewImg">
                        <br>
                        <input type="file" name="image" class="form-control w-50 m-auto mt-3" onchange="preview()">
                        @error('image')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <script>
                    function preview(){
                        let file = document.querySelector("input[name=image]").files[0];
                        let preview = document.getElementById("previewImg");
                        preview.src = URL.createObjectURL(file);
                    }
                    </script>

                    <div class="text-center mt-4">
                        <button class="btn btn-dark px-4">Update Profile</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

@endsection
