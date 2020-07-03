<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales_auto';
    protected $fillable = ['fecha', 'empleado', 'auto'];

    public function Car()
    {
        return $this->belongsTo(Car::class,'auto');
    }
}
