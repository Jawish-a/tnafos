<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = [
        'uuid', 'date', 'expiryDate', 'status', 'notes', 'terms',
        'pruchase_request_id', 'company_id', 'user_id', 'client_id',
        'subtotal', 'discount', 'tax', 'total',
    ];
    //
    public function purchaseRequest()
    {
        return $this->belongsTo('App\PurchaseRequest');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function client()
    {
        return $this->belongsTo('App\Company', 'client_id');
    }

    public function estimateLines()
    {
        return $this->hasMany('App\EstimateLine');
    }
}
