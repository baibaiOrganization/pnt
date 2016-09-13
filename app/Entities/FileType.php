<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    protected $fillable = ['name'];

    public function files(){
        return $this->hasMany(File::class);
    }
}
