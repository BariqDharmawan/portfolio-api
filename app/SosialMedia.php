<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class SosialMedia extends Model
{
    protected $table = 'social_media';
    protected $fillable = ['name', 'url', 'user_id'];

    public $timestamps = false;
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function setCreatedAtAttribute() {
        $this->attributes['created_at'] = Carbon::now();
    }
}
