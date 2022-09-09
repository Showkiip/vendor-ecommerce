<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporary extends Model
{
    use HasFactory;

    protected $fillable = [
       'order_Id','model_Id','date','time','name','address','phone','email','instructions'
    ];

     public function user()
		  {
		    return $this->belongsTo(User::class, 'id');
		  }

	 public function temporaryOrderTypes()
      {
        return $this->hasMany(TemporaryOrderType::class,'order_Id');
      }

      public function pModel()
		  {
		    return $this->belongsTo(Pmodel::class,'model_Id','id');
		  }
}
