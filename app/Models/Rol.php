<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rol';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * 
     */
    public function getUsersByRol()
    {
        return $this->hasMany('App\User','rol');
    }

    /**
     * 
     */
    public function getRolRepositoriesByRol()
    {
        return $this->hasMany('App\Models\Rol_Repository','rol');
    }
}
