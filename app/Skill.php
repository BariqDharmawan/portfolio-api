<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'my_skill';
    protected $fillable = ['name', 'category', 'start_from'];

    public $timestamps = false;
}
