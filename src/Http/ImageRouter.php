<?php

namespace LasseHaslev\LaravelImage\Http;

use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;
use LasseHaslev\LaravelImage\Http\Controllers\Api\ImagesController as ApiController;
use Illuminate\Support\Facades\Route;

/**
 * Class ImageRouter
 * @author Lasse S. Haslev
 */
class ImageRouter
{

    /**
     * Create routes to handle api
     *
     * @return void
     */
    public static function api()
    {
        Route::get( 'images', '\\' .ApiController::class . '@index' )
            ->name( 'api.images.index' );
        Route::get( 'images/{image}', '\\' .ApiController::class . '@show' )
            ->name( 'api.images.show' );
        Route::post( 'images', '\\' .ApiController::class . '@store' )
            ->name( 'api.images.store' );
        Route::delete( 'images/{image}', '\\' .ApiController::class . '@destroy' )
            ->name( 'api.images.destroy' );
    }

    /**
     * Create routes
     *
     * @return void
     */
    public static function web()
    {
        Route::get( 'images', '\\' .ImagesController::class . '@index' )
            ->name( 'images.index' );
        Route::post( 'images', '\\' .ImagesController::class . '@store' )
            ->name( 'images.store' );
        Route::put( 'images/{image}', '\\' .ImagesController::class . '@update' )
            ->name( 'images.update' );
        Route::delete( 'images/{image}', '\\' .ImagesController::class . '@destroy' )
            ->name( 'images.destroy' );
        Route::post( 'images/{image}/download', '\\' .ImagesController::class . '@download' )
            ->name( 'images.download' );
    }
}
