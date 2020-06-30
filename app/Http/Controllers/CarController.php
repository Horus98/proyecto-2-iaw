<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCarsSection()
    {
        return view('Autos.Autos');
    }

    public function showCarForm()
    {
        return view('Autos.AgregarAuto');
    }

    public function index()
    {
        $cars = $this->getCarsBrand();
        return view("Stock", compact('cars'));
    }
    public function indexDelete()
    {
        $cars = $this->getCarsBrand();
        return view("Autos.FiltroAutos", compact('cars'));
    }

    private function getCarsBrand()
    {
        return Car::orderBy('marca')->pluck('marca')->unique();
    }

    public function getModels($brandName)
    {
        return json_encode(Car::orderBy('modelo')->where('marca', '=', $brandName)->pluck("modelo", "modelo"));
    }

    public function getCarsInfo()
    {
        $consulta = $this->getCarsFromQuery();
        return view("consultaBD", compact('consulta'));
    }

    public function getCarsInfoEliminar()
    {
        $consulta = $this->getCarsFromQuery();
        return view("Autos.InformacionAutos", compact('consulta'));
    }

    private function getCarsFromQuery()
    {
        $brand = request('brandCar');
        $model = request('modelCar');
        $year = array(request('minYear'), request('maxYear'));
        $km = array(request('minKm'), request('maxKm'));
        $price = array(request('minPrice'), request('maxPrice'));
        $consulta = Car::whereMarca($brand)->whereModelo($model)->whereVendido(0)->whereBetween('anio', $year)->whereBetween('kilometros', $km)->whereBetween('precio', $price)->get();
        if ($brand == "*") {
            $consulta = Car::select($brand)->whereVendido(0)->whereBetween('anio', $year)->whereBetween('kilometros', $km)->whereBetween('precio', $price)->get();
        }

        return $consulta;

    }

    public function store(Request $request)
    {
        $this->saveCar($this->buildImage());
        $this->showMessage('El auto fue correctamente ingresado!!!');
        return redirect()->back();
    }

    private function saveCar($srcImage)
    {
        $car = new Car();
        $car->marca = request('marca');
        $car->modelo = request('modelo');
        $car->anio = request('anio');
        $car->kilometros = request('km');
        $car->precio = request('price');
        $car->vendido = 0;
        $car->imagen = $srcImage;
        $car->descripcion = request('descripcion');
        $car->save();
    }

    private function buildImage()
    {
        $srcImage = "NO HAY IMAGEN DISPONIBLE";
        if (request()->hasFile('imagen')) {
            request()->validate(['imagen' => 'file|image|max:2500']);
            $file = file_get_contents(request()->file('imagen'));
            $imageEncoded = base64_encode($file);
            $srcImage = "data:image/;base64, " . $imageEncoded;
        }
        return $srcImage;
    }

    public function destroy()
    {
        Car::destroy(request('carID'));
        return redirect()->back();
    }

    public function update()
    {
        $car = Car::find(request('carID'));
        $car = $this->changeDataCar($car);
        $car->save();
        $this->showMessage('El auto fue modificado correctamente!!');
        return redirect()->back();
    }

    private function showMessage($msj)
    {
        request()->session()->flash('alert-success', $msj);
    }

    private function changeDataCar($car)
    {
        $car->precio = (request('price') == null) ? $car->precio : request('price');
        $car->anio = (request('anio') == null) ? $car->anio : request('anio');
        $car->kilometros = (request('km') == null) ? $car->kilometros : request('km');
        $car->descripcion = (request('descripcion') == null) ? $car->precio : request('descripcion');
        return $car;
    }

}
