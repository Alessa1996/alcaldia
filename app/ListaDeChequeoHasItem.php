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
    protected $table = 'listadechequeo_has_item';

    protected $primaryKey = 'idlistait';
    
    protected $fillable = ['listadechequeo_idlista','item_iditem','cantidad','responsable','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function items()
    {
        return $this->belongsTo('App\Items', 'item_iditem', 'iditem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listadechequeo()
    {
        return $this->belongsTo('App\ListaDeChequeo', 'listadechequeo_idlista', 'idlista');
    }

}
