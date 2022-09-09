<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryOrder extends Model
{
    use HasFactory;

    protected $fillable = ['orderSales_id','accessory_id','brand_name','model_name','category','name','quantity','payment_status','price','grand_price'];


    public function orderSale()
    {
         return $this->belongsTo(OrderSale::class,'orderSales_id','id');
    }

    public function accessory()
    {
         return $this->belongsTo(Accessory::class,'accessory_id','id');
    }
}
