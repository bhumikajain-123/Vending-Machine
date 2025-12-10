<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $table = "products"; // your DB table name

    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];
}
