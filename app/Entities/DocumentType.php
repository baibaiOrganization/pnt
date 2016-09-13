<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $fillable = ['name'];

    public function propietors(){
        return $this->hasMany(Propietor::class);
    }
}
