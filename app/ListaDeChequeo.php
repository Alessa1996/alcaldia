<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idlista
 * @property string $nombre
 * @property string $created_at
 * @property string $update_at
 * @property Evento[] $eventos
 */
class ListaDeChequeo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'listadechequeo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idlista';

    /**
     * @var array
     */
    protected $fillable = [ 'nombre', 'created_at', 'update_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventos()
    {
        return $this->hasMany('App\Evento', 'listadechequeo_idlista', 'idlista');
    }
    public function listadechequeoHasItems()
    {
        return $this->hasMany('App\ListaDeChequeoHasItems', 'items_iditem', 'iditem');
    }
}



