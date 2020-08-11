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

    public $timestamps = false;
    public function getIsTeamWorkAttribute($value)
    {
        if ($value == true) {
            return 'This is teamwork project';
        }
        else {
            return 'This is self project';
        }
    }
    public function getFinishedDateAttribute($value)
    {
        return Carbon::parse($value)->toDateTimeString();
    }    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

}
