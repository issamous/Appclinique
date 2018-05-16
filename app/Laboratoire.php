<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratoire extends Model
{
    use SoftDeletes;
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = ['deleted_at'];
   public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function dossiers()
    {
        return $this->hasMany('App\Dossier');
    } 

}
