<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $fillable = ['name', 'award_type_id', 'production_id'];
}
