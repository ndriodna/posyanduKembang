<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $guarded = [];

    public function pencatatan(){
      return $this->belongsToMany('App\Pencatatan')->latest('tgl');
    }

    /*ngambil hanya 1 data terbaru berdasarkan tanggal*/
     public function pencatatanOne(){
      return $this->belongsToMany('App\Pencatatan')->take(1)->latest('tgl');
    }

    public function pelayanan()
    {
      return $this->belongsToMany('App\Pelayanan');
    }
}
