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
            $autos = array('A6','amg','chevy','ferrari','hilux','lambo','mercedes','mustang','nissan','range','reno4','rolls','serie3','tt');
            $arrays = range(0,1000);  
            foreach ($arrays as $valor) {
              $brandModel = $faker->vehicleArray;  
              DB::table('cars')->insert([	            
                  'marca' => $brandModel['brand'],
                  'modelo' => $brandModel['model'],
                  'anio' => $faker->biasedNumberBetween(1935,2021, 'sqrt'),
                  'precio' => rand(100000, 100000000),
                  'kilometros' => rand(0, 10000000),
                  'vendido' => 0,
                  'imagen' => 'uploads/'.$autos[rand(0,13)].'.jpg',
                  'descripcion' => implode(" ",$faker->vehicleProperties),
              ]);

    }
}
}
