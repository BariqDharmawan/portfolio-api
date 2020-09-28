<?php

namespace App\Models;

use Illuminate\Support\Str;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';
    protected $with = ['skillCategory'];
    protected $fillable = ['name', 'start_from', 'user_id', 'category_id'];

    public function skillCategory()
    {
        return $this->belongsTo('App\Models\SkillCategory', 'category_id')->withDefault();
    }
}
