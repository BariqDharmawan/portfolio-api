<?php

/** @var Factory $factory */

use App\Models\SkillCategory;
use App\User;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Skill::class, function (Faker $faker) {
    $skills = [
        'HTML', 'CSS', 'JS', 'SASS/SCSS', 'Stylus', 'Bootstrap',
        'VueJS', 'Laravel', 'Adonis', 'Webpack', 'GIT', 'Jquery'
    ];
    $getRandomSkill = $skills[$faker->unique()->numberBetween(0, 11)];

    return [
        'name' => $getRandomSkill,
        'slug' => Str::slug($getRandomSkill),
        'start_from' => $faker->randomElement([2016, 2017, 2018, 2019, 2020]),
        'user_id' => User::where('username', 'bariqdharmawan')->first()->id,
        'category_id' => SkillCategory::inRandomOrder()->first()->id
    ];
});
