<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    use HasFactory;

    protected $fillable = ['userId','token'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
