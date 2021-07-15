<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = ['purchase_id', 'product_id', 'cantidad', 'subtotal'];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
