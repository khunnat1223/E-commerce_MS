<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['title','description','cost','price','qty','inStock','Published','category_id','product_images'];

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
};

