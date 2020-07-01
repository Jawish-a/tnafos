<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function companies()
    {
        return $this->belongsToMany('App\Company')->withPivot('rate', 'unit', 'type')->withTimestamps();
    }
}
