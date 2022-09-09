<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable =['name','state_id','created_at','updated_at'];

   
        /**
         * Get the user that owns the City
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function state(): BelongsTo
        {
            return $this->belongsTo(State::class, 'state_id', 'id');
        }
  
}
