<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Movimiento::class, function (Faker\Generator $faker){
  return[
      'tipo' =>$faker->randomElement(['Ingreso','Debito']),
      'fecha_movimiento'=>$faker->date(),
      'categoria_id'=>$faker->numberBetween(1,9),
      'descripcion'=>$faker->paragraph,
      'dinero'=>$faker->numberBetween(1000,99000000),







  ]  ;






});


