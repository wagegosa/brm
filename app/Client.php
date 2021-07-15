<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nombre', 'email'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}
