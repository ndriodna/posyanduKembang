<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $guarded = [];

    public function familie(){
    return $this->belongsToMany('App\Familie');
    }
    public function family(){
        return $this->belongsTo('App\Familie','no_kk');
    }
}
