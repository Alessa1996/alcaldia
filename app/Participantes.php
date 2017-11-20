<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idparticipantes
 * @property string $nombre
 * @property string $apellido
 * @property int $cedula
 * @property string $created_at
 * @property string $updated_at
 * @property EventosHasParticipante[] $eventosHasParticipantes
 */
class Participantes extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'idparticipantes';

    /**
     * @var array
     */
    protected $fillable = ['nombrepa','apellido','cedula','telefono', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventosHasParticipantes()
    {
        return $this->hasMany('App\EventosHasParticipante', 'participantes_idparticipantes', 'idparticipantes');
    }
}
