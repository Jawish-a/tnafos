<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'rate','unit', 'type', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
