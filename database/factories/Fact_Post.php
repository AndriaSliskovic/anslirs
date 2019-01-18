<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Post::class, function (Faker $faker) {
    $naslov=$faker->sentence($nbWords = 6, $variableNbWords = true);
    $slug=Str::slug($naslov);
    return [
        'naslov'=>$naslov,
        'slug'=>$slug,
        'sadrzaj'=>$faker->paragraph($nbSentences = 40, $variableNbSentences = true),
        'vremeIzrade'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'skill'=>$faker->numberBetween($min = 1, $max = 5),
//        'slika'=>'ansli.png',
        'category_id'=>1,
        'tipovi_id'=>1,
        'user_id'=>1,
    ];
});
