<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    //
    protected $fillable = ['purchase_request_id', 'service_id'];

    public function purchaseRequest()
    {
        return $this->belongsTo('App\PurchaseRequest');
    }
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
