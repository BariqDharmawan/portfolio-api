<?php

use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class SkillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SkillCategory::class, 5)->create()->each(function ($category) {
            $category->make();
        });
    }
}
