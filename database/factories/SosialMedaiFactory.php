<?php

/** @var Factory $factory */

use App\SosialMedia;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SosialMedia::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array(
            'Instagram', 'Facebook', 'Whatsapp', 'Twitter', 'Linkedin', 'Bitbucket', 'Gmail'
        )),
        'url' => $faker->unique()->randomElement($array = array(
            'https://www.instagram.com/bariqdharmawans', 'https://www.facebook.com/BariqDharmawan16', 'https://wa.me/6287771406656',
            'https://twitter.com/BariqDharmawan', 'https://www.linkedin.com/in/dharmawan03',
            'https://bitbucket.org/dharmawans', 'dharmawan.muhammad03@gmail.com'
        )),
        'user_id' => 1
    ];
});
