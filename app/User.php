<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

   protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function medcien()
    {
        return $this->hasOne('App\Medcien');
    }

    public function clinique()
    {
        return $this->hasOne('App\Clinique');
    }

    public function laboratoire()
    {
        return $this->hasOne('App\Laboratoire');
    }
    
    public function administrateur()
    {
        return $this->hasOne('App\Administrateur');
    }
}
