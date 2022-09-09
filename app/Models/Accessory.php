<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model implements ReviewRateable
{
    use HasFactory,ReviewRateableTrait;

    protected $fillable = ['model_id','name','category_id','sell_price','orig_price','description','quantity'];

    public function models()
    {
        return $this->belongsTo(Pmodel::class,'model_id','id');
    }
    public function accessoryImage()
    {
        return $this->hasMany(AccessoryImage::class,'accessory_id','id');
    }

    public function accessoryCategory()
    {
         return $this->belongsTo(AccessoryCategory::class,'category_id','id');
    }
}
