<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dossier extends Model
{
    use SoftDeletes;

   protected $dates = ['deleted_at'];
   
   public function patient()
   {
       return $this->belongsTo('App\Patient');
   }

   public function laboratoir()
   {
       return $this->belongsTo('App\Laboratoir');
   }

}
