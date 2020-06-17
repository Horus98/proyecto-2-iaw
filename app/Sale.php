<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales_auto';

    public function Car()
    {
        return $this->belongsTo(Car::class,'auto');
    }
}
