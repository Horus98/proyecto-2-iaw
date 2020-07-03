<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'marca', 'modelo', 'anio', 'vendido', 'kilometros', 'precio', 'descripcion', 'imagen',
    ];

    public function Sale()
    {
        return $this->hasOne('App\Sale');
    }
}
