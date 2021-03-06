<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{  
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function dossiers()
    {
        return $this->hasMany('App\Dossier');
    }

}
