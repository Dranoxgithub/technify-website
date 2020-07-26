<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function NGO()
    {
        return $this->belongsTo('App\NGO');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
