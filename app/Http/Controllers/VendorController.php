<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor; 

class VendorController extends Controller
{
    
//    for sign-up 
  public function signup(){
    return view("vendor\signup");
  }

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
    "password" => bcrypt($req->password), // always hash password!
    "address" => $req->address,

    
]);

   return redirect('vendor/signup')->with('success','Registered Successfully');
  }


  //  for login -------------
     public function login(){

      return view('vendor/login');
     }
}
