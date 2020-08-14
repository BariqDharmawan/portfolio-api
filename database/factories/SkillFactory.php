<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Skill;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement($array = array(
            'HTML', 'CSS', 'JS', 'SASS/SCSS', 'Stylus', 'Bootstrap', 'Jquery', 'VueJS', 'Laravel', 'Adonis', 'Webpack', 'GIT'
        )),
        'category' => $faker->randomElement($array = array(
            'frontend-framework', 'backend-framework', 'basic-stack', 'tools', 'preprocessor'
        )),
        'start_from' => $faker->randomElement($array = array(2016, 2017, 2018, 2019, 2020)),
        'user_id' => 1
    ];
});
