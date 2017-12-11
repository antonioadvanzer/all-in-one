<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol_Repository extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rol_repository';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol', 'repository'
    ];

    /**
     * 
     */
    public function getRolAssociated()
    {
        return $this->belongsTo('App\Models\Rol','rol');
    }

    /**
     * 
     */
    public function getRepositoryAssociated()
    {
        return $this->belongsTo('App\Models\Repository','repository');
    }
}
