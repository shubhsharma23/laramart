<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function category(){
        
        return $this->hasMany('App\Models\Product','id');   
        
     }
     
     
    public $timestamps=false;  

    use HasFactory;
}

// class Category extends Model
// {
//     public $timestamps=false;  
//     protected $table='categories';
//     protected $primaryKey = 'cat_id';

//     use HasFactory;
// }

// class Seller extends Model
// {
//     public $timestamps=false;  
//     protected $table='sellers';
//     protected $primaryKey = 'seller_id';

//     use HasFactory;
// }
