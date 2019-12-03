<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['id'];

    public function costs(){
    	return $this->hasMany(Cost::class);
    }

    public function contacts(){
    	return $this->hasMany(Contact::class);
    }
}
