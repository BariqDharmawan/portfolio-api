<?php

/** @var Factory $factory */

use App\Models\SkillCategory;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'HTML', 'CSS', 'JS', 'SASS/SCSS', 'Stylus', 'Bootstrap',
            'VueJS', 'Laravel', 'Adonis', 'Webpack', 'GIT', 'Jquery'
        ]),
        'start_from' => $faker->randomElement([2016, 2017, 2018, 2019, 2020]),
        'user_id' => User::where('username', 'bariqdharmawan')->first(),
        'category_id' => factory(App\Models\SkillCategory::class)
    ];
});
