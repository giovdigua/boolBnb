<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Sponsor::class)->create(

               [
                   'nome' => 'basic',
                   'prezzo' => 2.99 ,
                   'durata' => 24
               ]);
        factory(Sponsor::class)->create(
               [
                   'nome' => 'medium',
                   'prezzo' => 5.99 ,
                   'durata' => 72
               ]);
        factory(Sponsor::class)->create(
               [
                   'nome' => 'extra',
                   'prezzo' => 9.99 ,
                   'durata' => 144
               ]);


    }
}
