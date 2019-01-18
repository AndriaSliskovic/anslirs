<?php

use Illuminate\Database\Seeder;

class Seed_Section extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Section::class,10)->create();
    }
}
