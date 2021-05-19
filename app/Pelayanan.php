<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $guarded = [];

    public function pendaftaran()
    {
    	return $this->belongsTo('App\Pendaftaran');
    }

    public function pencatatan(){
    	return $this->belongsTo('App\Pencatatan');
    }

    public function age()
    {
      return Carbon::parse($this->attributes['tgl_lahir'])->age;
    }
}
