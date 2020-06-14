<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cars = $this->getCarsBrand();
        return view("Stock",compact('cars'));
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
        $models = Car::where('marca','=',$brandName)->pluck("modelo","modelo");
        return json_encode($models);
    }

    public function getCarsInfo(){
        $brand = request('brandCar');
        $model = request('modelCar');
        $year =  array(request('minYear'),request('maxYear'));
        $km =  array(request('minKm'),request('maxKm'));
        $price =  array(request('minPrice'),request('maxPrice'));
        $consulta = Car::whereMarca($brand)->whereModelo($model)->whereVendido(0)->whereBetween('anio',$year)->whereBetween('kilometros',$km)->whereBetween('precio',$price)->get();
        if($brand == "*")
            $consulta = Car::select($brand)->whereVendido(0)->whereBetween('anio',$year)->whereBetween('kilometros',$km)->whereBetween('precio',$price)->get();
        
        return view("consultaBD",compact('consulta'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
