<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'percentage', 'image', 'active'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
