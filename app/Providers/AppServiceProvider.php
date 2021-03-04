<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mappingRepositoryInjections();
    }

    /**
     * Register repositories to controller injection interfaces.
     *
     * @return void
     */
    protected function mappingRepositoryInjections()
    {
        foreach (config('minmax.repository_injections', []) as $injection) {
            $this->app->when($injection[0])
                ->needs('Minmax\Base\Contracts\RepositoryInterface')
                ->give($injection[1]);
        }
    }
}
