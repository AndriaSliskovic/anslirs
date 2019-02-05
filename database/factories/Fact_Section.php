<?php

use Faker\Generator as Faker;

$factory->define(\App\Section::class, function (Faker $faker) {
    return [
        'naslov'=>$faker->word,
        'podnaslov'=>$faker->word,
        'sadrzaj'=>$faker->paragraph,
        'slika'=>'testImages/sectionTest.png',
        'link'=>'www.ansli.rs',
        'sec_id'=>function () {
        return factory(App\SectCat::class)->create()->id;
    },
    ];
});
