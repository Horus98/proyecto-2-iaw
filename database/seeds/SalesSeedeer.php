<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Sale;

class SalesSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carsIDs = DB::table('cars')->pluck('id');
        $this->markCarAsSold();
        for ($valor=0; $valor <= 50 ; $valor++) { 
            $sale = new Sale();
            $sale->fill(['fecha' => $this->randomDate(), 'empleado' => $this->randomEmployee(), 'auto' => $carsIDs[$valor]]);
            $sale->save(); 
        }
    }
    
    private function randomEmployee(){
        $empleados = array ("Juan","Pedro","Miguel","Matias","Rodrigo","Ernesto","Diego","juanes","Fernando","Josh");
        return $empleados[rand(0,count($empleados)-1)];
    }

    private function randomDate(){
        $fechas = array("2020-12-12","2019-12-12","2018-01-01");
        return $fechas[rand(0,count($fechas)-1)];
    }

    private function markCarAsSold(){
        $range = range(1,51);
        foreach ($range as $i ) {
            $car = Car::find($i);
            $car->vendido = 1;
            $car->save();
        }
    }
}
