<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','product_id','shipAddress_id','conditiion','storage','color'
                           ,'brand_name','model_name','quantity','price','grand_price'];

public function user()
{
return $this->belongsTo(User::class,'user_id','id');
}
public function product()
{
  return $this->belongsTo(Product::class,'product_id','id');
}
public function shipAddress()
{
  return $this->belongsTo(ShippingAddr::class,'shipAddress_id','id');
}
}
