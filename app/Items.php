<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $listadechequeo_idlista
 * @property string $item
 * @property int $cantidad
 * @property string $responsable
 * @property string $created_at
 * @property string $update_at
 * @property Evento[] $eventos
 */
class Items extends Model
{
	/**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'items';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'iditem';

    /**
     * @var array
     */
    protected $fillable = [ 'item', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listadechequeo()
    {
        return $this->belongsTo('App\listadechequeo_', 'listadechequeo_idlista', 'idlista');
    }
    //
}
