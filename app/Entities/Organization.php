<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;
use Theater\User;

class Organization extends Model
{
    protected $fillable = ['name', 'email', 'address', 'phone', 'mobile', 'website', 'socials', 'city', 'region_id'];

    public function award(){
        return $this->hasOne(Award::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
