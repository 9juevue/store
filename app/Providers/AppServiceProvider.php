<?php

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Connection;

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
        Model::preventLazyLoading(!app()->environment('production'));
        Model::preventSilentlyDiscardingAttributes(!app()->environment('production'));

        DB::whenQueryingForLongerThan(500, function (Connection $connection) {
            // TODO Добавить логирование
        });
    }
}
