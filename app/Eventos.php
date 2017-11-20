<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ideventos
 * @property int $listadechequeo_idlista
 * @property string $fecha
 * @property string $lugar
 * @property string $hora
 * @property string $nombre_eve
 * @property string $responsable
 * @property string $tematica
 * @property string $programacion
 * @property string $created_at
 * @property string $updated_at
 * @property Listadechequeo $listadechequeo
 * @property EventosHasParticipante[] $eventosHasParticipantes
 */
class Eventos extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'eventos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ideventos';

    /**
     * @var array
    */
    protected $fillable = ['fecha', 'lugar', 'hora', 'nombre_eve', 'responsable', 'tematica', 'programacion','listadechequeo_idlista', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listadechequeo()
    {
        return $this->belongsTo('App\ListaDeChequeo', 'listadechequeo_idlista', 'idlista');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventosHasParticipantes()
    {
        return $this->hasMany('App\EventosHasParticipantes', 'eventos_ideventos', 'ideventos');
    }
}
