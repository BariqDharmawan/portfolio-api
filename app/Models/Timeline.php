<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Timeline extends Model
{
    protected $table = 'timeline';
    protected $with = ['owner'];
    protected $fillable = ['achievement', 'desc', 'year_begin', 'year_end', 'user_id'];

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function getAchievementAttribute($value)
    {
        return Str::ucfirst($value);
    }
}
