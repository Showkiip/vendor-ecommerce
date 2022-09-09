<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    use HasFactory;

    protected $fillable = ['name','type_id','quantity'];

    public function kitchentype()
    {
        return $this->belongsTo(KitchenType::class);
    }

}
