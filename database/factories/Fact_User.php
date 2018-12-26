<?php

use Faker\Generator as Faker;

$factory->define(\App\User::class, function (Faker $faker) {
    return [
        'name' => 'SuperAdmin',
        'email' => 'super@email.com',
        'password' => '1Qwert', // secret
        'remember_token' => str_random(10),
        'admin'=>1,
        'superadmin'=>1,
        'oblast_id'=>1
    ];
});
