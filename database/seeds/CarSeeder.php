<?php

use App\Car;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $autos = array('A6', 'amg', 'chevy', 'ferrari', 'hilux', 'lambo', 'mercedes', 'mustang', 'nissan', 'range', 'reno4', 'rolls', 'serie3', 'tt');
        $arrays = range(0, 100);
        foreach ($arrays as $valor) {
            $brandModel = $faker->vehicleArray;
            $car = new Car();
            $car->fill(['marca' => $brandModel['brand'], 'modelo' => $brandModel['model'], 'anio' => $faker->biasedNumberBetween(1935, 2021, 'sqrt'),
                'precio' => rand(100000, 100000000), 'kilometros' => rand(0, 10000000), 'vendido' => 0, 'imagen' => 'uploads/' . $autos[rand(0, 13)] . '.jpg',
                'descripcion' => implode(" ", $faker->vehicleProperties)]);
            $car->save();
        }
    }
}
