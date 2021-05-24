<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    public function pendaftaran()
    {
    	return $this->belongsTo('APP\Pendaftaran');
    }

    public function pencatatan()
    {
    	return $this->belongsTo('APP\Pencatatan');
    }

    public function pelayanan()
    {
    	return $this->belongsTo('APP\Pelayanan');
    }
}
