<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tipo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idtipo';

    /**
     * @var array
    */
    protected $fillable = ['nombreti','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  
    public function usuario()
    {
        return $this->hasMany('App\User', 'idtipo', 'tipo_idtipo');
    }
}
