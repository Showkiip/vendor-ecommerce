<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairType extends Model
{
    use HasFactory;
    protected $fillable = [
        'model_Id','repair_type','price'
    ];

    public function tmodel()
		  {
		    return $this->belongsTo(Pmodel::class, 'id');
		  }
          public function repairOrderType()
          {
            return $this->hasMany(RepairOrderType::class,'id','repair_type');
          }
}
