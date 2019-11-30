<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function companies()
    {
        return $this->hasMany('App\Company');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
