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
        $this->createRoutes();
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

    /**
     * Create routes
     *
     * @return void
     */
    public function createRoutes()
    {

        $router = ImageRouter::create();
        $router->add( 'images.index', [
            'uri'=>'images',
            'method'=>'get',
            'as'=>'images.index',
            'uses'=>'\\' .ImagesController::class . '@index',
            'middleware'=>null,
        ] );
        $router->add( 'images.store', [
            'uri'=>'images',
            'method'=>'post',
            'as'=>'images.store',
            'uses'=>'\\' .ImagesController::class . '@store',
            'middleware'=>null,
        ] );
        $router->add( 'images.update', [
            'uri'=>'images/{image}',
            'method'=>'put',
            'as'=>'images.update',
            'uses'=>'\\' .ImagesController::class . '@update',
            'middleware'=>null,
        ] );
        $router->add( 'images.destroy', [
            'uri'=>'images/{image}',
            'method'=>'delete',
            'as'=>'images.destroy',
            'uses'=>'\\' .ImagesController::class . '@destroy',
            'middleware'=>null,
        ] );
        $router->add( 'images.download', [
            'uri'=>'images/{image}/download',
            'method'=>'post',
            'as'=>'images.download',
            'uses'=>'\\' .ImagesController::class . '@download',
            'middleware'=>null,
        ] );
    }
}
