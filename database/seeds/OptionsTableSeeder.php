<?php

use Illuminate\Database\Seeder;
use App\Option;
use App\Apartment;
use App\seeds\ApartmentsTableSeeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $options = factory(Option::class, 8)->create(); 
    }
}
