<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    protected $guarded = [];

    public function pendaftaran()
    {
    	return $this->belongsToMany('App\Pendaftaran');
    }

    public function pelayanan(){
    	return $this->belongsToMany('App\Pelayanan');
    }
}
