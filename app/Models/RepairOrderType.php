<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairOrderType extends Model
{
    use HasFactory;

   protected $fillable = [
        'order_Id','repair_type','price'];

    public function repairorder()
		  {
		    return $this->belongsTo(RepairOrder::class, 'id');
		  }

           public function repairType()
          {
            return $this->belongsTo(RepairType::class,'id');
          }
}
