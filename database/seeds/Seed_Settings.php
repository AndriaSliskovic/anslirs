<?php

use Illuminate\Database\Seeder;

class Seed_Settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Settings::class)->create();
    }
}
