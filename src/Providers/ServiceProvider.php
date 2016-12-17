<?php namespace LasseHaslev\LaravelImage\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use LasseHaslev\LaravelImage\Http\ImageRouter;
use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;

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

        if ((boolean) config( 'laravelimage.routes' )) {
            $this->loadRoutesFrom( __DIR__.'/../../routes/web.php' );
        }


        $this->loadViewsFrom( __DIR__.'/../../resources/views', 'images' );
    }

}
