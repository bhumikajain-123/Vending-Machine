<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vendor\v_product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    // Add Product Page
    public function add_product(){
        return view('vendor.add_product');
    }

    // Store Product
    public function store_product(Request $req){
        $req->validate([
            "vp_name" => "required",
            "vp_price" => "required|numeric",
            "vp_stock" => "required|integer",
            "vp_description" => "required",
            "vp_category" => "required",
            "vp_image" => "required|image",
        ],[
            'vp_name.required' => 'Product name is required',
            'vp_price.required' => 'Product price is required',
            'vp_stock.required' => 'Stock quantity is required',
            'vp_category.required' => 'Please select category',
            'vp_description.required' => 'Please write product description',
        ]);

        $filename = null;
       if($req->hasFile('vp_image')){
    $file = $req->file('vp_image');
    $filename = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('uploads/product'), $filename);
}

        // Get vendor ID from session
        $vendorId = session('vendorId');
        if(!$vendorId){
            return redirect('vendor/login')->with('error','Please login to add product.');
        }

        v_product::create([
            'v_id'          => $vendorId,
            'p_name'        => $req->vp_name,
            'p_price'       => $req->vp_price,
            'p_image'       => $filename,
            'p_stock'       => $req->vp_stock,
            'p_description' => $req->vp_description,
            'c_id'          => $req->vp_category,
        ]);

        return redirect()->back()->with('success','Product Added Successfully');
    }

    // View Products
    public function view_product(){
        $products = v_product::all();
        return view('vendor.view_product', compact('products'));
    }

    // Edit Product
    public function edit_product($id){
        $product = v_product::where('p_id', $id)->firstOrFail();
        return view('vendor.edit_product', compact('product'));
    }

    // Update Product
    public function update_product(Request $req, $id){
        $req->validate([
            "vp_name" => "required",
            "vp_price" => "required|numeric",
            "vp_stock" => "required|integer",
            "vp_description" => "required",
            "vp_category" => "required",
        ]);

        $product = v_product::where('p_id', $id)->firstOrFail();

        $product->update([
            'p_name' => $req->vp_name,
            'p_price' => $req->vp_price,
            'p_stock' => $req->vp_stock,
            'p_description' => $req->vp_description,
            'c_id' => $req->vp_category,
        ]);

        return redirect()->route('vendor.view_product')->with('success','Product updated successfully!');
    }

    // Delete Product
    public function delete_product($id){
        $product = v_product::findOrFail($id);

       if($product->p_image && file_exists(public_path('uploads/product/'.$product->p_image))){
    unlink(public_path('uploads/product/'.$product->p_image));
}

        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully!');
    }

    // Vendor Profile
        public function vendor_profile() {
        $vendor = Vendor::find(session('vendorId'));
        return view('vendor.profile', compact('vendor'));
    }

    // Update vendor profile
    public function update_profile(Request $req) {
        $vendor = Vendor::find(session('vendorId'));

        if(!$vendor) {
            return redirect()->back()->with('error', 'Vendor not found!');
        }

        $req->validate([
            "id_number"         => "required",
            "phone"             => "required|regex:/^[6-9][0-9]{9}$/|unique:vendors,phone,".$vendor->id,
            "email"             => "required|email|unique:vendors,email,".$vendor->id,
            "full_name"         => "required",
            "business_name"     => "required",
            "address"           => "required",
            "business_type"     => "required",
            "gst_number"        => "required",
            "business_category" => "required",
            "bank_account_no"   => "required",
            "payment_method"    => "required",
            "image"             => "nullable|mimes:jpg,jpeg,png",
            "password"          => "nullable|min:6",
        ]);

        // Assign values
        $vendor->id_number         = $req->id_number;
        $vendor->phone             = $req->phone;
        $vendor->email             = $req->email;
        $vendor->full_name         = $req->full_name;
        $vendor->business_name     = $req->business_name;
        $vendor->address           = $req->address;
        $vendor->business_type     = $req->business_type;
        $vendor->gst_number        = $req->gst_number;
        $vendor->business_category = $req->business_category;
        $vendor->bank_account_no   = $req->bank_account_no;
        $vendor->payment_method    = $req->payment_method;

        if($req->password) {
            $vendor->password = Hash::make($req->password);
        }

        if($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('vendor_img'), $filename);
            $vendor->image = $filename;
        }

        $vendor->save();

        return redirect()->back()->with('success', 'Profile Updated Successfully!');
    }
}
