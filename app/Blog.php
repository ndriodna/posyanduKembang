<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use Sluggable;
    protected $guarded = [];

    public function sluggable(){
        return ['slug'=>['source'=>'title','onUpdate'=>true]];
    }
    public function familie(){
    return $this->belongsTo('App\Familie');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
