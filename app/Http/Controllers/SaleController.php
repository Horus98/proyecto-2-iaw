<?php

namespace App\Http\Controllers;

use App\Car;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFilter()
    {
        return view('Ventas.FiltroVentas');
    }

    public function showVentas()
    {
        return view('Ventas.Ventas');
    }

    public function show()
    {
        $ventas = Sale::with('Car')->get();
        return view('Ventas.InformacionVentas', compact('ventas'));
    }

    public function getBrands()
    {
        $brands = Car::orderBy('marca')->select('marca')->distinct()->get();
        return json_encode($brands);
    }

    public function create()
    {
        $data = $this->getDataCar();
        if ($data[0] == "*") {
            $consulta = Car::select($data[0])->whereVendido(0)->whereBetween('anio', $data[2])->whereBetween('kilometros', $data[3])->whereBetween('precio', $data[4])->get();
        } else {
            $consulta = Car::whereMarca($data[0])->whereModelo($data[1])->whereVendido(0)->whereBetween('anio', $data[2])->whereBetween('kilometros', $data[3])->whereBetween('precio', $data[4])->get();
        }

        return view("Ventas.AgregarVenta", compact('consulta'));
    }

    private function getDataCar()
    {
        $data = array();
        $data[0] = request('brandCar');
        $data[1] = request('modelCar');
        $data[2] = array(request('minYear'), request('maxYear'));
        $data[3] = array(request('minKm'), request('maxKm'));
        $data[4] = array(request('minPrice'), request('maxPrice'));
        return $data;
    }

    public function store()
    {
        $this->sellCar(request()->carID);
        $this->saveSale(request()->carID);
        $this->redirectMjs('Se ha almacenado correctamente la venta, Felicidades!!');
        return redirect()->back();
    }

    public function destroy()
    {
        $numero = request('saleID');
        $this->changeCarStatus(Sale::find($numero)->auto);
        Sale::destroy($numero);
        return redirect()->back();
    }

    private function changeCarStatus($carId)
    {
        $car = Car::find($carId);
        $car->vendido = 0;
        $car->save();
    }

    private function saveSale($carId)
    {
        $sale = new Sale();
        $sale->empleado = request('empleado');
        $sale->fecha = date('Y-m-d');
        $sale->auto = $carId;
        $sale->save();
    }

    private function sellCar($carId)
    {
        $car = Car::find($carId);
        $car->vendido = 1;
        $car->save();
    }

    public function update()
    {
        $this->changeSaleName();
        $this->redirectMjs('Se ha editado correctamente al usuario');
        return redirect()->back();
    }

    private function changeSaleName()
    {
        $sale = Sale::find(request()->saleID);
        $sale->empleado = request()->name;
        $sale->save();
    }

    private function redirectMjs($msj)
    {
        request()->session()->flash('alert-success', $msj);
    }

}
