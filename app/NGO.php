<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngo extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
