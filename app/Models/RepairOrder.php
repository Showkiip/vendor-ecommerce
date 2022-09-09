<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_Id','date','time_id','name','address','phone','email','instructions'
    ];

     public function user()
		  {
		    return $this->belongsTo(User::class, 'id');
		  }

	 public function repairorderstypes()
      {
        return $this->hasMany(RepairOrderType::class,'order_Id');
      }

      public function pModel()
		  {
		    return $this->belongsTo(Pmodel::class,'model_Id','id');
		  }
      public  function OrderTime()
      {
          return $this->hasMany(OrderTime::class,'id','time_id');
      }
}
