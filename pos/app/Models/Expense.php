<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'user_id', 'expensetype_id', 'description', 'created_at'];

    public function expensetype()
    {
        return $this->belongsTo(Expensetype::class);
    }
}
