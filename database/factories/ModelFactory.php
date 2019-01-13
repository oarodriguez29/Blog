<?php

use App\User; /* Cargo el Modelo 'User', para usar las Clase (User::class) -> Ej. Personalizado */
use Faker\Generator; /* Cargo el Faker, para usa la instancia (Generator) -> Ej. Personalizado. */

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/* NOTA: ModelFactory -> Ejemplo Original de Laravel.

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

*/

/* NOTA: ModelFactory -> Ejemplo Personalizado.
 * Este Factory lo Ejecutamos o lo Llamamos desde la Fn->run(),
 * del Seeder Relacionado (en este caso 'UserSeeder').
 *
 * IMPORTANTE: los Factory se usan para cargar n cantidad de registros 
 * de prueba en la Base de Datos.
 */

$factory->define(User::class, function (Generator $faker) {
    $array = [
        'name' 		=> 	$faker->name,
        'email' 	=> 	$faker->email,
        'password' 	=> 	bcrypt('123456')
    ];
    return $array;
});