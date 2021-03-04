<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'uuid', 'date', 'dueDate', 'status', 'notes', 'terms',
        'pruchase_request_id', 'company_id', 'user_id', 'client_id',
        'subtotal', 'discount', 'tax', 'total',
    ];
    //
    public function estimate()
    {
        return $this->belongsTo('App\Estimate');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function client()
    {
        return $this->belongsTo('App\Company', 'client_id');
    }

    public function lines()
    {
        return $this->hasMany('App\InvoiceLine');
    }
}
