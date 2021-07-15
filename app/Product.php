<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'lote', 'cantidad', 'fecha_vencimiento', 'precio', 'proveedor_id'];

    public function proveedor(){
        return $this->belongsTo( Proveedor::class );
    }

    public function purchase_details(){
        return $this->hasMany(PurchaseDetail::class);
    }
}
