<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaDeChequeoHasItem extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'lista_de_chequeo_has_items';

    
    protected $fillable = ['listadechequeo_idlista','items_iditem','cantidad','responsable','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function items()
    {
        return $this->belongsTo('App\Items', 'items_iditem', 'iditem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listadechequeo()
    {
        return $this->belongsTo('App\ListaDeChequeo', 'listadechequeo_idlista', 'idlista');
    }

}
