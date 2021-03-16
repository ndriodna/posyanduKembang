<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familie extends Model
{
  protected $guarded = [];

  public function resident(){
  return $this->belongsToMany('App\Resident');
  }
  public function kepala(){
      return $this->belongsTo('App\Resident','kepala_keluarga');
  }
}
