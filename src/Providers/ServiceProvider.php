<?php namespace LasseHaslev\LaravelImage\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @author Lasse S. Haslev
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../../config/laravelimage.php', 'laravelimage');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/laravelimage.php'=>'laravelimage',
        ]);
        $this->loadMigrationsFrom( __DIR__.'/../../database/migrations' );
    }
}