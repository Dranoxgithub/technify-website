<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // allow all attributes mass assignable
    protected $guarded = [];

    public function Ngo()
    {
        return $this->belongsTo('App\NGO');
    }

    // public function User()
    // {
    //     return $this->belongsTo('App\User');
    // }
}
