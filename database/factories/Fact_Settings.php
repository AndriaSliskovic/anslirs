<?php

use Faker\Generator as Faker;

$factory->define(\App\Settings::class, function (Faker $faker) {
    return [
        'imeSajta'=>'Ansli d.O.O.',
        'adresa'=>'Ruzveltova 46',
        'mesto'=>'Beograd',
        'email'=>'ansli@gmx.com',
        'telefon'=>'+381 64 1304128',
        'logo'=>$faker->imageUrl($width = 640, $height = 480)
    ];
});
