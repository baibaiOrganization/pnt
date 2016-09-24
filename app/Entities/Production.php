<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['name', 'release_date', 'genre', 'link_video'];

    public function award(){
        return $this->hasOne(Award::class);
    }
}
