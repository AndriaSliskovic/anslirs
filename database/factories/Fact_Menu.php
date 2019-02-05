<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'putanja'=>'home',
        'level'=>$faker->biasedNumberBetween(1,5),
        'tezina'=>$faker->biasedNumberBetween(1,3),
        'oblast_id'=>$faker->biasedNumberBetween(1,3),
    ];
});
