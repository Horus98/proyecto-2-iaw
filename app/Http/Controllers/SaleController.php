<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Car;


class SaleController extends Controller
{
    public function show()
    {  
        $ventas = Sale::with('Car')->get();
        return view('ListarVentas',compact('ventas'));
    }

    public function getBrands(){
        $brands = Car::orderBy('marca')->select('marca')->distinct()->get();
        return json_encode($brands);
    }

    public function create()
    {
        $brand = request('brandCar');
        $model = request('modelCar');
        $year =  array(request('minYear'),request('maxYear'));
        $km =  array(request('minKm'),request('maxKm'));
        $price =  array(request('minPrice'),request('maxPrice'));
        $consulta = Car::whereMarca($brand)->whereModelo($model)->whereVendido(0)->whereBetween('anio',$year)->whereBetween('kilometros',$km)->whereBetween('precio',$price)->get();
        if($brand == "*")
            $consulta = Car::select($brand)->whereVendido(0)->whereBetween('anio',$year)->whereBetween('kilometros',$km)->whereBetween('precio',$price)->get();
        
        return view("AgregarVentaListaAutos",compact('consulta'));
    }

    public function store($carId){
        $sale = new Sale();
        $car = Car::find($carId);
        $car->vendido = 1;
        $car->save();
        Sale::insert(
            ['empleado' => request('empleado'),
             'fecha' => date('Y-m-d'),
             'auto' => $carId
             ]
        ); 
        /** 
        $sale->empleado = request('empleado');
        $sale->fecha = date('Y-m-d');
        $sale->auto = $carId;
        $sale->save();
        */
        //return  redirect()->route('AgregarVenta');
        request()->session()->flash('alert-success', 'Se ha almacenado correctamente la venta, Felicidades!!');
        return redirect()->route('AgregarVenta');
    }

}
