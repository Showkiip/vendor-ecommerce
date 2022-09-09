<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneService extends Model
{
    use HasFactory;

    protected $fillable = ['service_name','created_at','updated_at'];

    public function product()
    {
        return $this->belongsToMany(Product::class,'phone_serivce_products');
    }
}
