<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'oblast_id'=>$faker->biasedNumberBetween(1,3)
    ];
});
