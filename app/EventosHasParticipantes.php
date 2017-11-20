<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $eventos_ideventos
 * @property int $participantes_idparticipantes
 * @property string $created_at
 * @property string $updated_at
 * @property Evento $evento
 * @property Participante $participante
 */
class EventosHasParticipantes extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['eventos_ideventos','participantes_idparticipantes','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento()
    {
        return $this->belongsTo('App\Evento', 'eventos_ideventos', 'ideventos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participante()
    {
        return $this->belongsTo('App\Participantes', 'participantes_idparticipantes', 'idparticipantes');
    }
}
