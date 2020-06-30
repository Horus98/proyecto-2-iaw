<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Car;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        for ($valor=0; $valor <= 100 ; $valor++) { 
            $brandModel = $faker->vehicleArray;
            $car = new Car();
            $car->fill(['marca' => $brandModel['brand'], 'modelo' => $brandModel['model'], 'anio' => $this->randomYear(),
                'precio' => rand(100000, 100000000), 'kilometros' => rand(0, 10000000), 'vendido' => 0, 'imagen' => $this->randomImage(),
                'descripcion' => implode(" ", $faker->vehicleProperties)]);
            $car->save();
        }
    }

    private function randomImage(){
        $autos = array('A6', 'amg', 'chevy', 'ferrari', 'hilux', 'lambo', 'mercedes', 'mustang', 'nissan', 'range', 'reno4', 'rolls', 'serie3', 'tt');
        return '/uploads/' . $autos[rand(0, 13)] . '.jpg';
    }
    
    private function randomYear(){
        return rand(1935,2021);
    }
}
