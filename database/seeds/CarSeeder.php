<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       $faker = (new \Faker\Factory())::create();
            $faker->addProvider(new \Faker\Provider\Fakecar($faker));
            
            $arrays = range(0,100);  
            foreach ($arrays as $valor) {
              $brandModel = $faker->vehicleArray;  
              DB::table('cars')->insert([	            
                  'marca' => $brandModel['brand'],
                  'modelo' => $brandModel['model'],
                  'anio' => $faker->biasedNumberBetween(1998,2017, 'sqrt'),
                  'precio' => rand(100000, 100000000),
                  'kilometros' => rand(0, 2000000),
                  'vendido' => 'FALSE',
                  'imagen' => "No hay",
                  'descripcion' => implode(" ",$faker->vehicleProperties),
              ]);

    }
}
}
