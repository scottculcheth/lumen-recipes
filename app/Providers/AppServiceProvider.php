<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Gousto\Database\Contract\RecipeSelectInterface',
            'App\Gousto\Database\RecipeCsvSelectService'
        );

        $this->app->bind(
            'App\Gousto\Database\Contract\RecipeInsertInterface',
            'App\Gousto\Database\RecipeCsvInsertService'
        );

        $this->app->bind(
            'App\Gousto\Database\Contract\RecipeUpdateInterface',
            'App\Gousto\Database\RecipeCsvUpdateService'
        );

        $this->app->bind(
            'App\Gousto\Database\Contract\RatingInsertInterface',
            'App\Gousto\Database\RatingCsvInsertService'
        );

    }
}
