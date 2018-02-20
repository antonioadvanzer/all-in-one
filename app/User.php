<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'photo', 'password', 'employed', 'type_user', 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 
     */
    public function getTypeUserAssociated()
    {
        return $this->belongsTo('App\Models\Type_User','type_user');
    }

    /**
     * 
     */
    public function getRolAssociated()
    {
        return $this->belongsTo('App\Models\Rol','rol');
    }
}
