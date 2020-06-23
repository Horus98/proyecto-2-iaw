<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;


const SELECT = ['marca','modelo','anio','precio','kilometros','descripcion','imagen'];

class ApiController extends Controller
{
     
    public function show(){

        return Car::orderBy('marca')->select(SELECT)->whereVendido(0)->get();
    }
    
    public function showByBrand(){
        $brand = request('Marca');
        return Car::orderBy('modelo')->select(SELECT)->whereMarca($brand)->whereVendido(0)->get();
    }

}
