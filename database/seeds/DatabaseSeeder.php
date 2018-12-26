<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            Seed_Settings::class,
            Seed_Oblast::class,
            Seed_Tipovi::class,
            Seed_User::class,
            Seed_Category::class,
            Seed_Menu::class,
            Seed_Post::class,
            Seed_Profile::class,

            //Many to Many relacija
        ]);
    }
}
