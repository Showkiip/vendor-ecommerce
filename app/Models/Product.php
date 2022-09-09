<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

use Illuminate\Database\Eloquent\Model;

class Product extends Model implements ReviewRateable
{
    use HasFactory,ReviewRateableTrait;

    protected $fillable = ['locked','sim_card_format','memory','warranty'
                            ,'model_id','category','network',
                            'desc','screen_size','screen_type','OS','resolution','megapixel',
                           'double_sim','release_year','service_id','type'
                        ];


    /**
     * Get the productImage that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    /**
     * Get the model that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function models()
    {
        return $this->hasMany(Pmodel::class,'model_id', 'id');
    }

    public function color()
    {
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
    public function order()
    {
      return $this->hasMany(Order::class,'product_id');
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class,'product_id');
    }

    public function service()
    {
        return $this->belongsToMany(PhoneService::class,'phone_serivce_products');
    }
}
