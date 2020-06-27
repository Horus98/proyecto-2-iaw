<?php

use Illuminate\Database\Seeder;
use App\Car;

class SalesSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = array ("Juan","Pedro","Miguel","Matias","Rodrigo","Ernesto","Diego");
        $fechas = array("2020-12-12","2019-12-12","2018-01-01");
        $carsIDs = DB::table('cars')->pluck('id');
        $this->markCarAsSold();
        $arrays = range(0,500);  
        foreach ($arrays as $valor) {
            DB::table('sales_auto')->insert([	            
                'fecha' => $fechas[rand(0,count($fechas)-1)],
                'empleado' => $empleados[rand(0,count($empleados)-1)],
                'auto' => $carsIDs[$valor],
            ]);
        }
    }
   
    private function markCarAsSold(){
        $range = range(1,501);
        foreach ($range as $i ) {
            $car = Car::find($i);
            $car->vendido = 1;
            $car->save();
        }
    }
}
