<?php

use Faker\Generator as Faker;

$factory->define(\App\Section::class, function (Faker $faker) {
    return [
        'sec_id'=>$faker->numberBetween(1,10),
        'naslov'=>$faker->word,
        'podnaslov'=>$faker->word,
        'sadrzaj'=>$faker->paragraph,
        'slika'=>$faker->image($dir = '/tmp', $width = 640, $height = 480),
        'link'=>'www.ansli.rs',
    ];
});
