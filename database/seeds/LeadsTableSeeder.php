<?php

use Illuminate\Database\Seeder;
use App\Lead;

class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lead::class, 30)->create();
    }
}
