<?php

namespace App\Providers;

use App\Models\Difficulty;
use App\Models\Genre;
use App\Models\User;
use App\Models\Score;
use App\Models\Console;
use App\Models\Game;
use App\Models\Type;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('difficulty-owner', function(User $user, Difficulty $difficulty){
            return $user->id === $difficulty->user_id;
        });

        Gate::define('score-owner', function(User $user, Score $score){
            return $user->id === $score->user_id;
        });

        Gate::define('genre-owner', function(User $user, Genre $genre){
            return $user->id === $genre->user_id;
        });

        Gate::define('console-owner', function(User $user, Console $console){
            return $user->id === $console->user_id;
        });

        Gate::define('type-owner', function(User $user, Type $type){
            return $user->id === $type->user_id;
        });

        Gate::define('game-owner', function(User $user, Game $game){
            return $user->id === $game->user_id;
        });
    }
}
