<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $guarded = [];

    public function pendaftaran()
    {
    	return $this->belongsToMany('App\Pendaftaran');
    }

    public function pencatatan(){
    	return $this->belongsToMany('App\Pencatatan');
    }
}
