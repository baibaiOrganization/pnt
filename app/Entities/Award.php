<?php

namespace Theater\Entities;

use Illuminate\Database\Eloquent\Model;
use Theater\User;

class Award extends Model
{
    protected $fillable = ['name', 'state', 'award_type_id', 'user_id', 'organization_id', 'propietor_id', 'production_id', 'categories', 'sound', 'isSelected', 'isPreselected', 'isSelEdit', 'region_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function organization(){
        return $this->belongsTo(Organization::class);
    }

    public function production(){
        return $this->belongsTo(Production::class);
    }

    public function propietor(){
        return $this->belongsTo(Propietor::class);
    }

    public function awardType(){
        return $this->belongsTo(AwardType::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }

    public function file($type){
        return $this->files()->where('file_type_id', $type)->first();
    }

    public function awardCategory($id){
        return in_array($id, explode(',',$this->categories));
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function scores(){
        return $this->hasMany(Score::class);
    }

    public function score($category){
        return $this->scores()->where('category_id', $category)->first();
    }
}
