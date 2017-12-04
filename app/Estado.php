<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Estado extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'estado';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idestado';

    /**
     * @var array
    */
    protected $fillable = ['estado','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  
    public function eventosHasParticipantes()
    {
        return $this->hasMany('App\EventosHasParticipantes', 'estado_idestado', 'idestado');
    }
}
