<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddr extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'userId',
        'mobileNo',
        'shipaddress',
        'country',
        'state',
        'city',
        'zipcode',
        'street_address',
        'email'
    ];

      public function user()
		  {
		    return $this->belongsTo(User::class, 'id');
		  }
          public function order()
          {
            return $this->hasMany(Order::class,'shipAddress_id');
          }
}
