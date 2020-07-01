<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = ['uuid','date', 'details', 'company_id'];

    public function lines()
    {
        return $this->hasMany('App\Line');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
