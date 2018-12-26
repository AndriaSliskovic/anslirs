<?php

use Illuminate\Database\Seeder;

class Seed_Tipovi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tipovi::class,3)->create();
    }
}
