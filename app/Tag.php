<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    protected $guarded = [];
    use Sluggable;
    
    public function sluggable(){
       return ['slug'=>['source'=>'name','onUpdate'=>true]];
   }
    public function blog(){
      return $this->belongsToMany('App\Blog');
    }
}
