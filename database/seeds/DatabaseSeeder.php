<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Llamado de la clase 'UserSeeder::class'
        $this->call(UserSeeder::class);
        
        // $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
