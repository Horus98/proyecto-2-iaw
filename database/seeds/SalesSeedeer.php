<?php

use Illuminate\Database\Seeder;

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
        $arrays = range(0,20);  
        foreach ($arrays as $valor) {
            DB::table('sales_auto')->insert([	            
                'fecha' => $fechas[rand(0,count($fechas)-1)],
                'empleado' => $empleados[rand(0,count($empleados)-1)],
                'auto' => $carsIDs[rand(0,count($carsIDs)-1)],
            ]);
        }
    }
}
