<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Familie extends Model
{
  use Sluggable;
  protected $guarded = [];

  public function sluggable(){
      return ['slug'=>['source'=>'no_kk','onUpdate'=>true]];
  }
  public function resident(){
  return $this->belongsToMany('App\Resident');
  }

  public function user()
  {
  	return $this->belongsToMany('App\User');
  }
}
