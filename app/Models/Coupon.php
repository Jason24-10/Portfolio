<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'discount', 'expires_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_coupons')->withPivot('used')->withTimestamps();
    }
}


