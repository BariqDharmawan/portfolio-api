<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'my_project';
    protected $fillable = ['title', 'finished_date', 'is_teamwork', 'desc'];
    protected $dates = ['finished_date'];
    
    public $timestamps = false;
}
