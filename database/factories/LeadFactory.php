<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lead;
use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Lead::class, function (Faker $faker) {
    return [
        'messaggio' => $faker->text($maxNbChars = 800),
        'nome' => $faker->name(),
        'email_mittente' => $faker->safeEmail(),
        'oggetto' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'apartment_id' => Apartment::inRandomOrder()->first()->id
    ];
});
