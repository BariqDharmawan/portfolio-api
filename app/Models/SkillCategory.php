<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $table = 'skill_category';
    protected $fillable = ['category'];

    public $timestamps = false;
    public function allSkill()
    {
        return $this->hasMany('App\Models\Skill', 'category_id');
    }
}
