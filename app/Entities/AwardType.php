<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class AwardType extends Model
{
    protected $fillable = ['name'];

    public function awards(){
        return $this->hasMany(Award::class);
    }
}
