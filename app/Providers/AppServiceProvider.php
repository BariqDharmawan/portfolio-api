<?php

namespace App\Providers;

use App\Skill;
use App\Project;
use App\Observers\SlugObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
// use App\UuidHelper;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alpha_space', function ($attribute, $value) {
            return preg_match('/^[\pL\s]+$/u', $value); 
        });
        
    }
}
