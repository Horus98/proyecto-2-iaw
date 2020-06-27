<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Car;


class SaleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function showFilter(){
        return view('Ventas.FiltroVentas');
    }

    public function showVentas(){
        return view('Ventas.Ventas');
    }

    public function show()
    {  
        $ventas = Sale::with('Car')->get();
        return view('Ventas.InformacionVentas',compact('ventas'));
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

        return view("Ventas.AgregarVenta",compact('consulta'));
    }

    public function store(){
        $this->sellCar(request()->carID);
        $this->saveSale(request()->carID);
        $this->redirectMjs('Se ha almacenado correctamente la venta, Felicidades!!');
        return redirect()->back();
    }

    public function destroy(){
        $numero = request('saleID');
        $this->changeCarStatus(Sale::find($numero)->auto);
        Sale::destroy($numero);   
        return redirect()->back();
    }

    private function changeCarStatus($carId){
        $car = Car::find($carId);
        $car->vendido= 0;
        $car->save();
    }

    private function saveSale($carId){
        $sale = new Sale();
        $sale->empleado = request('empleado');
        $sale->fecha = date('Y-m-d');
        $sale->auto = $carId;
        $sale->save();
    }

    private function sellCar($carId){
        $car = Car::find($carId);
        $car->vendido = 1;
        $car->save();
    }

    public function update(){
        $sale = Sale::find(request()->saleID);
        $sale->empleado = request()->name;
        $sale->save();
        $this->redirectMjs('Se ha editado correctamente al usuario');
        return redirect()->back();
    }

    private function redirectMjs($msj){
        request()->session()->flash('alert-success', $msj);
    }

}
