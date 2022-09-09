<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStorage extends Model
{
    use HasFactory;
    protected $fillable =[
        'storage','color_id'
    ];

    public function color()
    {
        return $this->belongsTo(ProductColor::class,'color_id','id');
    }
    public function productCondition()
    {
        return $this->hasMany(productCondition::class,'storage_id','id');
    }
}
