<?php

use Illuminate\Database\Seeder;

class Seed_User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create();
    }
}
