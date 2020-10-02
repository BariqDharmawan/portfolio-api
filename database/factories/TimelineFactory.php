<?php

/** @var Factory $factory */

use App\Models\Timeline;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Timeline::class, function (Faker $faker) {
    return [
        'achievement' => strtolower($faker->sentence),
        'desc' => strtolower($faker->paragraph),
        'year_begin' => $faker->numberBetween($min = 2005, $max = 2015),
        'year_end' => $faker->numberBetween($min = 2015, $max = 2020),
        'user_id' => 1
    ];
});
