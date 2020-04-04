<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {

  $options = [
    'WiFi',
    'Posto Macchina',
    'Piscina',
    'Vista Mare',
    'Portineria',
    'Sauna',
    'Aria Condizionata',
    'Cucina'
  ];
    return [
        'nome' => $faker->unique()->randomElement($options)
    ];
});
