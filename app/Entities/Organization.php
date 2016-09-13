<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['name', 'email', 'city', 'address', 'phone', 'mobile', 'website'];
}
