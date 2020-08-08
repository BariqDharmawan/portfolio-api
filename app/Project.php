<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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

}
