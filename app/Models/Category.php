<?php

namespace App\Models;
use App\Models\Product;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function products(){
        return $this->belongsTo('App\Models\Category','prd_cat_id');  
     }
        use HasFactory;
}
