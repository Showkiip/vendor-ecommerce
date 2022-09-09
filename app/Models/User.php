<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phoneno',
        'city',
        'country',
        'zipcode',
        'state',
        'created_at',
        'updated_at',
        'token_forget'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      public function shippingaddress()
          {
            return $this->hasMany(ShippingAddr::class, 'userId');
          }

      public function repairorders()
      {
        return $this->hasMany(RepairOrder::class, 'userId');
      }
      public function verifyUser()
        {
        return $this->hasOne(VerifyUser::class, 'userId');
        }
      public function order()
        {
            return $this->hasMany(Order::class,'user_id');
        }
      public function wishlist()
        {
            return $this->hasMany(Wishlist::class,'user_id');
        }
}
