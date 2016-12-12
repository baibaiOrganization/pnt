<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['score', 'category_id', 'award_id', 'user_id'];
}
