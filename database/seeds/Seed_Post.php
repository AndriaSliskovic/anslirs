<?php

use Illuminate\Database\Seeder;

class Seed_Post extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class,20)->create();
    }
}
