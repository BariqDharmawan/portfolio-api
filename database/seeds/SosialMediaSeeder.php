<?php

use Illuminate\Database\Seeder;

class SosialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SosialMedia::class, 7)->create()->each(function ($sosmed) {
            $sosmed->make();
        });
    }
}
