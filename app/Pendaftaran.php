<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $guarded = [];

    public function pencatatan(){
      return $this->belongsToMany('App\Pencatatan');
    }
}
