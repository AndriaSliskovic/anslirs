<?php

use Illuminate\Database\Seeder;

class Seed_SectCat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SectCat::class,10)->create();
    }
}
