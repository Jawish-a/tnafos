<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // mass assignment
    protected $fillable = [
        'name', 'type', 'cr', 'vat', 'establishment_year', 'total_employees', 'bio',
        'telephone', 'fax', 'email', 'website', 'country', 'city', 'po_box', 'zip_code',
        'address', 'location','admin'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }

}
