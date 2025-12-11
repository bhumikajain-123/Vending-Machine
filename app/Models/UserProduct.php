<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $table = "v_item"; // your DB table name
     protected $primaryKey = 'p_id'; 
    protected $fillable = [
        'p_name',
        'p_price',
        'p_image',
        'p_description'
    ];
}
