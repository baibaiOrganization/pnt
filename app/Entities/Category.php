<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    function awards(){
        return $this->belongsToMany(Award::class);
    }

    public function score($category){
        return $this->where('ca', 1);
    }
}
