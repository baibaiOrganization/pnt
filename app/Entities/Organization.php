<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;
use Theater\User;

class Organization extends Model
{
    protected $fillable = ['name', 'email', 'city', 'address', 'phone', 'mobile', 'website', 'socials', 'region'];

    public function award(){
        return $this->hasOne(Award::class);
    }

    /*
    public function awardColon(){
        return $this->awards()->where('award_type_id', 1)->first();
    }
    
    public function awardSemana(){
        return $this->awards()->where('award_type_id', 2)->first();
    }
    */
}
