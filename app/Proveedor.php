<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['nombre', 'email'];
    
    public function producto()
    {
        return $this->hasMany(Product::class);
    }
}
