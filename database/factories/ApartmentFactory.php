<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'titolo' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'stanze' => $faker->numberBetween($min = 1, $max = 3),
        'posti_letto' => $faker->numberBetween($min = 1, $max = 3),
        'bagni' => $faker->numberBetween($min = 1, $max = 2),
        'dimensioni' => $faker->numberBetween($min = 10, $max = 50),
        'descrizione' => $faker->text($maxNbChars = 500),
        'img' => $faker->imageUrl($width = 640, $height = 480),
        'indirizzo' => $faker->address(),
        'paese' => $faker->country(),
        'lon' => $faker->longitude($min = -180, $max = 180),
        'lat' => $faker->latitude($min = -90, $max = 90),
        'user_id' => User::inRandomOrder()->first()->id,
        'visibilita' => 1
    ];
});
