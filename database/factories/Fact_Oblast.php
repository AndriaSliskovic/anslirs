<?php

use Faker\Generator as Faker;

$factory->define(\App\Oblast::class, function (Faker $faker) {
    return [
        'name'=>$faker->word
    ];
});
