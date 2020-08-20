<?php

/** @var Factory $factory */

use App\Models\SkillCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SkillCategory::class, function (Faker $faker) {
    return [
        'category' => $faker->randomElement([
            'frontend-framework',
            'backend-framework',
            'basic-stack',
            'tools',
            'preprocessor'
        ]),
    ];
});
