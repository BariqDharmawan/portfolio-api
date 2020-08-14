<?php

namespace App;

use App\Slugging;
use Illuminate\Support\Str;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'my_skill';
    protected $fillable = ['name', 'category', 'start_from'];

    public $timestamps = false;
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::of($value)->replace('/', '-')->slug('-');
    }
}
