<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = ['id'];

    public function courses(){
    	return $this->hasMany(Course::class,'sub_category_id');
    }
}
