<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTime extends Model
{
    use HasFactory;

    protected $fillable = ['fromTime','toTime'];

    public  function repairOrder()
    {
        return $this->belongsTo(RepairOrder::class,'time_id');
    }
}
