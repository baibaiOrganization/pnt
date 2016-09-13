<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class Propietor extends Model
{
    protected $fillable = ['name', 'last_name', 'document_type_id', 'document_number', 'mobile', 'email1', 'email2'];

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }

    public function documentType(){
        return $this->belongsTo(DocumentType::class);
    }
}
