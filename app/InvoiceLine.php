<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    //
    protected $fillable = ['invoice_id', 'service_id', 'unit', 'type', 'rate'];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

}
