<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'region_id'];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function organizations(){
        return $this->hasMany(Organization::class);
    }
}
