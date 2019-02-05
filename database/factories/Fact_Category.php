<?php

use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'oblast_id'=>function () {
            return factory(App\Oblast::class)->create()->id;
        }
    ];
});
