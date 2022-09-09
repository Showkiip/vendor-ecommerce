<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCondition extends Model
{
    use HasFactory;
    protected $fillable =[
        'storage_id','condition','price','quantity','orig_price'
    ];

    public function storage()
    {
        return $this->belongsTo(ProductStorage::class,'storage_id','id');
    }
}
