<?php

namespace Theater;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Theater\Entities\Award;
use Theater\Entities\Region;
use Theater\Entities\Role;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role_id', 'region_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function awards(){
        return $this->hasMany(Award::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
