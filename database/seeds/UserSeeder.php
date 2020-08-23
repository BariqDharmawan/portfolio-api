<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('gakadapassword')
        ]);

        factory(User::class, 4)->create()->each(function ($user) {
            $user->make();
        });
    }
}
