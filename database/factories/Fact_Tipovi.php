<?php

use Faker\Generator as Faker;

$factory->define(\App\Tipovi::class, function (Faker $faker) {
    return [
        'name'=>$faker->word
    ];
});
