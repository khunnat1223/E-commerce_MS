<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    protected $fillable = ['order_id', 'status', 'amount', 'type', 'address','phone','delivery','imagepay', 'created_by', 'updated_by'];
    use HasFactory;
    // public function order()
    // {
    //     return $this->hasOne(Order::class, 'id', 'order_id');
    // }
    function order()  {
        return $this->belongsTo(Order::class);
    }
}
