<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expensetype extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'active'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
