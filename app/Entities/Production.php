<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $fillable = ['name', 'release_date', 'genre', 'link_video'];

    public function files(){
        return $this->hasMany(File::class);
    }

    public function award(){
        return $this->belongsTo(Award::class);
    }
}
