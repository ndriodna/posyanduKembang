<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Permission\Traits\HasRoles;

class Familie extends Model
{
  use Sluggable, HasRoles;
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
