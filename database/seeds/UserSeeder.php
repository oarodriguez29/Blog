<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; /* cargo el Eloquent para hacer uso de la clase (DB::). */

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* NOTA: Este Seeder es solo para cargar 
         * 1 Unico Registro de Prueba en la BD.
         */
        // creo los datos de prueba en la BD.
/*        DB::table('users')->insert([
        	'name'	=>	'Pedrito Perez',
        	'email'	=>	'pedrito@mail.com',
        	'password'	=>	bcrypt('pedrito'),
        	'type'	=>	'admin',
        ]);
*/

        /* NOTA: Este Seeder es solo para cargar
         * n Cantidad de Registro de Prueba en la BD.
         */
        // Llamo el Factory Creado para User.
        factory(App\User::class, 10)->create();
    }
}

/* IMPORTANTE: Para Aplicar los Seeder, se debe Ejecutar
 * por la Terminal o Consola el comando:
 * -> php artisan db:seed
 */