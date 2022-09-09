<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'grand_total', 'receive', 'change', 'created_at', 'return_amount'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
