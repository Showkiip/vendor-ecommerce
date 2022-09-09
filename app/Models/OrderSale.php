<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSale extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','grand_total','shipping_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function shipAddress()
    {
        return $this->belongsTo(ShippingAddr::class,'shipping_id','id');
    }
    public function accessoryOrder()
    {
         return $this->hasMany(AccessoryOrder::class,'orderSale_id','id');
    }
}
