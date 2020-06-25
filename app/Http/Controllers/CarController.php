<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use DB;

class CarController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showCarsSection(){
        return view('Autos.Autos');
    }

    public function showCarForm(){
        return view('Autos.AgregarAuto');
    }

    public function listAllCars(){
        /* $consulta = Car::all()->sortBy('id')->simplePaginate(15); */
        $consulta = Car::orderBy('marca')->paginate(15);
        return view("Autos.listarTodosAutos",compact('consulta'));
    }

    public function index()
    {   
        $cars = $this->getCarsBrand();
        return view("Stock",compact('cars'));
    }
    public function indexDelete()
    {   
        $cars = $this->getCarsBrand();
        return view("Autos.eliminar",compact('cars'));
    }

    private function getCarsBrand(){
        $i = 0;
        $cars = array();
        $autos = Car::orderBy('marca')->get();
            foreach($autos as $car){
                $cars[$i] = $car->marca;
                $i = $i + 1;
            }
        $cars = array_unique($cars);
        return $cars;
    }

    public function getModels($brandName){
        $models = Car::orderBy('modelo')->where('marca','=',$brandName)->pluck("modelo","modelo");
        return json_encode($models);
    }

    public function getCarsInfo(){
        $consulta = $this->getCarsFromQuery();
        return view("consultaBD",compact('consulta'));
    }

    public function getCarsInfoEliminar(){
        $consulta = $this->getCarsFromQuery();
        return view("Autos.autosEliminar",compact('consulta'));
    }

    private function getCarsFromQuery(){
        $brand = request('brandCar');
        $model = request('modelCar');
        $year =  array(request('minYear'),request('maxYear'));
        $km =  array(request('minKm'),request('maxKm'));
        $price =  array(request('minPrice'),request('maxPrice'));
        $consulta = Car::whereMarca($brand)->whereModelo($model)->whereVendido(0)->whereBetween('anio',$year)->whereBetween('kilometros',$km)->whereBetween('precio',$price)->get();
        if($brand == "*")
            $consulta = Car::select($brand)->whereVendido(0)->whereBetween('anio',$year)->whereBetween('kilometros',$km)->whereBetween('precio',$price)->get();
        return $consulta;

    }

    public function store(Request  $request){

        $this->saveCar($this->buildImage());
        $this->showMessage('El auto fue correctamente ingresado!!!');
        return redirect()->back(); 

    }

    private function saveCar($srcImage){
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

    private function buildImage(){
        $srcImage = "NO HAY IMAGEN DISPONIBLE";
            if (request()->hasFile('imagen')) {
                $file =file_get_contents(request()->file('imagen'));
                $imageEncoded = base64_encode($file);
                $srcImage = "data:image/;base64, ".$imageEncoded;
            }
        return $srcImage;
    }

    public function destroy()
    {   $id = request('carID');
        Car::destroy($id);
        return redirect()->back();
    }

    public function update(){
        $car = Car::find(request('carID'));
        $car->precio = (request('price')==null ) ? $car->precio : request('price');
        $car->anio = (request('anio')==null ) ? $car->anio : request('anio');
        $car->kilometros = (request('km')==null ) ? $car->precio : request('km');
        $car->descripcion = (request('descripcion')==null ) ? $car->precio : request('descripcion');
        $car->save();
        $this->showMessage('El auto fue modificado correctamente!!');
        return redirect()->back();
    }

    private function showMessage($msj){
        request()->session()->flash('alert-success', $msj);
    }
    
}
