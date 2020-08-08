<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngo extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
