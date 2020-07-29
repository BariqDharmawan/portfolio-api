<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Skill::class, 12)->create()->each(function ($skill) {
            $skill->make();
        });
    }
}
