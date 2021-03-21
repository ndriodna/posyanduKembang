<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Resident extends Model
{
  use Sluggable;

    protected $guarded = [];

    public function sluggable(){
        return ['slug'=>['source'=>'nik','onUpdate'=>true]];
    }
    public function familie(){
    return $this->belongsToMany('App\Familie');
    }
  
}
