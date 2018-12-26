<?php

use Illuminate\Database\Seeder;

class Seed_Oblast extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Oblast::class,3)->create();
    }
}
