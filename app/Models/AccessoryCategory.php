<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryCategory extends Model
{
    use HasFactory;
    protected $fillable = ['category','created_at','updated_at'];

    public function accessory()
    {
         return $this->hasMany(Accessory::class,'category_id','id');
    }
}
