<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([	            
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin1234',
            'rol' => 'Administrador',
            'api_token' => Str::random(60),
        ]);

        DB::table('users')->insert([	            
            'name' => 'Administrador',
            'email' => 'proyectoWeb@laravel.com',
            'password' => bcrypt('123456789'),
            'rol' => 'Administrador',
            'api_token' => Str::random(60),
        ]);
    }
}
