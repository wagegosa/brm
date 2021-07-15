<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['fecha_compra', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
