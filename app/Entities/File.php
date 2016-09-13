<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'file_type_id', 'organization_id', 'production_id', 'propietor_id'];

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function fileType(){
        return $this->belongsTo(FileType::class);
    }

    public function propietor(){
        return $this->belongsTo(Propietor::class);
    }

    public function production(){
        return $this->belongsTo(Production::class);
    }
}
