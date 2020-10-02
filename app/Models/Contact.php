<?php

namespace App\Models;

use Carbon\Carbon;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['name', 'value', 'user_id'];
    public $timestamps = false;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getNameAttribute($value)
    {
        return Str::ucfirst($value);
    }
    public function setCreatedAtAttribute() {
        $this->attributes['created_at'] = Carbon::now();
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }
}
