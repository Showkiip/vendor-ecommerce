<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'color_name',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class,'color_id','id');
    }

    public function productStorage()
    {
        return $this->hasMany(ProductStorage::class,'color_id','id');
    }
}
