<?php

use Faker\Generator as Faker;

$factory->define(App\Trip::class, function (Faker $faker) {
    return [
        'location' => $faker->city(),
        'image' => 'https://picsum.photos/600/338?image='.mt_rand(0, 85),
        'content' => $faker->realText(),
        'stars' => $faker->numberBetween(0, 100),
    ];
});
