<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenType extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    public function kitchen()
    {
        return $this->hasMany(kitchen::class, 'type_id');
    }
}
