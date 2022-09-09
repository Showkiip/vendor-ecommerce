<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryImage extends Model
{
    use HasFactory;

    protected $fillable = ['images','accessory_id'];

    public function accessory()
    {
        return $this->belongsTo(Accessory::class,'accessory_id','id');
    }
}
