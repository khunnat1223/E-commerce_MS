<?php

namespace App\Models;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Payment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price', 'status', 'user_address_id',  'created_by', 'updated_by'];
    use HasFactory;
    public function user_address_id()
    {
        return $this->belongsTo(UserAddress::class, 'user_address_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    function order_items()  {
        return $this->hasMany(OrderItem::class);
    }

     // Relationship with the payment
     public function payment()
     {
         return $this->hasOne(Payment::class);
     }
}
