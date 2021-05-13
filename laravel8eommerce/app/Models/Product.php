<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','brand_id','product_name','product_code','product_quantity','short_description','long_description','price','image','image_one','image_two','image_three',
        'image_path',
        ];
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
