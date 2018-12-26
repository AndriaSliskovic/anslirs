<?php

use Illuminate\Database\Seeder;

class Seed_Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class,8)->create();
    }
}
