<?php

use Faker\Generator as Faker;

$factory->define(\App\Profile::class, function (Faker $faker) {
    return [
        'avatar'=>$faker->imageUrl($width = 400, $height = 200),
        'user_id'=>1,
        'about'=>$faker->paragraph($nbSentences = 6, $variableNbSentences = true),
        'facebook'=>$faker->url,
        'youtube'=>$faker->url,
    ];
});
