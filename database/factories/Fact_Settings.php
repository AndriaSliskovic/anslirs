<?php

use Faker\Generator as Faker;

$factory->define(\App\Settings::class, function (Faker $faker) {
    return [
        'imeSajta'=>'Ansli d.O.O.',
        'title'=>'NaslovSajta',
        'adresa'=>'Ruzveltova 46',
        'mesto'=>'Beograd',
        'email'=>'ansli@gmx.com',
        'telefon'=>'+381 64 1304128',
        'logo'=>'testImages/logoTest.png'
    ];
});
