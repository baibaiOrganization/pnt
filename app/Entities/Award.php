<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = ['name', 'award_type_id', 'production_id'];

    public function organizations(){
        return $this->belongsToMany(Organization::class);
    }

    public function production(){
        return $this->hasOne(Production::class);
    }

    public function awardType(){
        return $this->belongsTo(AwardType::class);
    }
}
