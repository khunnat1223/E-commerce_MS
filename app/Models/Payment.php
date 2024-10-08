<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'status', 'amount', 'type', 'address', 'phone',
        'delivery', 'imagepay', 'created_date', 'created_by', 'updated_by'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
