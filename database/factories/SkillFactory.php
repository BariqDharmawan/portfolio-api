<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Skill;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array(
            'HTML', 'CSS', 'JS', 'SASS/SCSS', 'Stylus', 'Bootstrap', 'Jquery', 'VueJS', 'Laravel', 'Adonis', 'Webpack', 'GIT'
        )),
        'category' => $faker->randomElement($array = array(
            'frontend-framework', 'backend-framework', 'basic-stack', 'tools', 'preprocessor'
        )),
        'start_from' => $faker->year($max = 'now')
    ];
});
