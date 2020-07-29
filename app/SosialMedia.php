<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SosialMedia extends Model
{
    protected $table = 'social_media';
    protected $fillable = ['name', 'url'];
}
