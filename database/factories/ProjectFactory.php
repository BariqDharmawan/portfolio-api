<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->randomElement($array = array(
            'Desainin marketplace', 'Dickson Synergy company profile', 'Insive Ecommerce',
            'Gema Kreasi Pratama company profile', 'Lesin order teacher', 'Ebina money management'
        )),
        'finished_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'is_teamwork' => $faker->boolean($chanceOfGettingTrue = 50),
        'desc' => $faker->text($maxNbChars = 200),
        'user_id' => 1
    ];
});
