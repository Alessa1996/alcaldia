<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tematica extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tematica';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtematica';

    /**
     * @var array
    */
    protected $fillable = ['tematica','descripcion','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  
    public function eventos()
    {
        return $this->hasMany('App\Eventos', 'idtematica', 'tematica_idtematica');
    }
}
