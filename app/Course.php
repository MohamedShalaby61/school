<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','image','center_phone','center_name','whats_app','brief','address','sub_category_id'];

    public function costs(){
    	return $this->hasMany(Cost::class);
    }

    public function contacts(){
    	return $this->hasMany(Contact::class);
    }
}
