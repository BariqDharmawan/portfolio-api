<?php

use App\Models\Timeline;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Timeline::class, 4)->create()->each(function ($timeline) {
            $timeline->make();
        });
    }
}
