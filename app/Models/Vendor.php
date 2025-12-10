<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
       'full_name', 'email', 'phone', 'address', 'password', 
    'business_name','business_type','gst_number','business_category',
    'bank_account_no','payment_method','id_number','image'

    ];
       protected $hidden = ['password'];
}
