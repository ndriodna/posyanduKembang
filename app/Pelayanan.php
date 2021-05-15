<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $guarded = [];

    public function pendaftaran()
    {
    	return $this->belongsTo('App\pendaftaran');
    }
}
