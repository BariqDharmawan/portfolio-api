<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'bariqdharmawan',
            'password' => 'gakadapassword'
        ]);

        factory(User::class, 4)->create()->each(function ($user) {
            $user->make();
        });
    }
}
