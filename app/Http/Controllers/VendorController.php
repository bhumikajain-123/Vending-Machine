<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    // signup page
    public function signup(){
        return view("vendor.signup");
    }

    // save vendor
    public function register(Request $req){
        $req->validate([
            "full_name" => "required",
            "phone" => "required|regex:/^[6-9][0-9]{9}/|unique:vendors,phone",
            "email" => "required|email|unique:vendors,email",
            "password" => "required",
            "address" => "required"
        ]);

        Vendor::create([
            "full_name" => $req->full_name,
            "phone" => $req->phone,
            "email" => $req->email,
            "password" => bcrypt($req->password),
            "address" => $req->address,
        ]);

        return redirect('vendor/signup')->with('success','Registered Successfully');
    }



    // login page
    public function login(){
        return view('vendor.login');
    }



    // login check
    public function login_check(Request $req){
        $req->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $vendor = Vendor::where('email', $req->email)->first();

        if($vendor && Hash::check($req->password, $vendor->password)){

            if($vendor->status == "verified"){

                session(['vendorLogin' => true]);
                session(['name' => $vendor->full_name]);
                session(['vendorId' => $vendor->id]); //

                return redirect('vendor/dashboard');
            }
            else {
                return redirect('vendor/login')->with('error','User not verified');
            }
        }

        return back()->with('error','Please enter correct email and password!');
    }



    // dashboard
    public function dashboard(){
        if(session()->has('vendorLogin')){
            return view('vendor.dashboard');
        }

        return redirect('vendor/login');
    }



    // logout
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('vendor/login');
    }


    public function vendor_profile() {
    $vendor = Vendor::find(session('vendorId')); // get logged-in vendor
    return view('vendor.profile', compact('vendor'));
}

// update profile
public function update_profile(Request $req) {
    $vendor = Vendor::find(session('vendorId'));

    if(!$vendor){
        return redirect()->back()->with('error', 'Vendor not logged in!');
    }

    $req->validate([
        "full_name" => "required",
        "phone"     => "required|regex:/^[6-9][0-9]{9}$/|unique:vendors,phone,".$vendor->id,
        "email"     => "required|email|unique:vendors,email,".$vendor->id,
        "address"   => "required",
        "password"  => "nullable|min:6",
        "image"     => "nullable|mimes:jpg,jpeg,png"
    ]);

    $vendor->full_name = $req->full_name;
    $vendor->phone     = $req->phone;
    $vendor->email     = $req->email;
    $vendor->address   = $req->address;

    if($req->password){
        $vendor->password = bcrypt($req->password);
    }

    if($req->hasFile('image')){
        $file = $req->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('vendor_img'), $filename);
        $vendor->image = $filename;
    }

    $vendor->save();

    return redirect()->back()->with("success","Profile Updated Successfully!");
}

}
