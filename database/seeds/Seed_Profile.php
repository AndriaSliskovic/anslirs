<?php

use Illuminate\Database\Seeder;

class Seed_Profile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Profile::class)->create();
    }
}
