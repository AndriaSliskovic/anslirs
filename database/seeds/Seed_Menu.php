<?php

use Illuminate\Database\Seeder;

class Seed_Menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Menu::class,3)->create();
    }
}
