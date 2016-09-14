<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'file_type_id', 'award_id'];

    public function award(){
        return $this->belongsTo(Award::class);
    }

    public function fileType(){
        return $this->belongsTo(FileType::class);
    }
}
