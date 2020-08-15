<?php

namespace App\Models;

use Illuminate\Support\Str;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = ['title', 'finished_date', 'is_teamwork', 'desc', 'user_id'];
    protected $casts = ['is_teamwork' => 'boolean'];
    protected $dates = ['finished_date'];
    protected $appends = ['is_teamwork'];

    public $timestamps = false;
    public function getIsTeamWorkAttribute($value)
    {
        return $value == true ? 'This is teamwork project' : 'This is self project';
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::of($value)->replace('/', '-')->slug('-');
    }

}
