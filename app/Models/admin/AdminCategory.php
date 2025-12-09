<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class AdminCategory extends Model
{
    protected $fillable = [
        'p_name',
        'p_comission'
    ];
}
