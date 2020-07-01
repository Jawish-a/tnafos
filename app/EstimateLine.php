<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstimateLine extends Model
{
    //
    protected $fillable = ['estimate_id', 'service_id', 'unit', 'type', 'rate'];

    public function estimate()
    {
        return $this->belongsTo('App\Estimate');
    }
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
