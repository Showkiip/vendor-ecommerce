<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryOrderType extends Model
{
    use HasFactory;
      protected $fillable = [
        'order_Id','repair_type','price'];

    public function temporary()
		  {
		    return $this->belongsTo(Temporary::class, 'order_Id');
		  }

           public function repairType()
          {
            return $this->belongsTo(RepairType::class,'id');
          }
}
