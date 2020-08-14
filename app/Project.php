<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'my_project';
    protected $fillable = ['title', 'finished_date', 'is_teamwork', 'desc'];
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
