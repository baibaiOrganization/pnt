<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Propietor extends Model
{
    protected $fillable = ['name', 'last_name', 'document_type_id', 'document_number', 'mobile', 'email1', 'email2'];
}
