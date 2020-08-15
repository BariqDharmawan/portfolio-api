<?php

/** @var Factory $factory */

use App\Models\Contact;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array(
            'Instagram', 'Facebook', 'Whatsapp', 'Twitter', 'Linkedin', 'Bitbucket', 'Gmail'
        )),
        'url' => $faker->unique()->randomElement($array = array(
            'https://www.instagram.com/bariqdharmawans', 'https://www.facebook.com/BariqDharmawan16',
            'https://twitter.com/BariqDharmawan', 'https://www.linkedin.com/in/dharmawan03',
            'https://bitbucket.org/dharmawans', 'dharmawan.muhammad03@gmail.com',
            'https://wa.me/6287771406656',
        )),
        'user_id' => User::where('username', 'bariqdharmawan')->first()
    ];
});
