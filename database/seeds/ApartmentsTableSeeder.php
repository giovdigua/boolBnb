<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\Option;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 50)
        ->create()
        ->each(function ($apartment){
          $options = Option::inRandomOrder()->take(1,3)->get();
          $apartment->options()->attach($options);
        });
    }
}
