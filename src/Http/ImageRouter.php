<?php

namespace LasseHaslev\LaravelImage\Http;

use LasseHaslev\LaravelPackageRouter\PackageRouter;
use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;
use LasseHaslev\LaravelImage\Http\Controllers\Api\ImagesController as ApiController;

/**
 * Class ImageRouter
 * @author Lasse S. Haslev
 */
class ImageRouter extends PackageRouter
{

    /**
     * @param mixed
     */
    public function __construct()
    {
        $this->createRoutes();
        $this->createApiRoutes();
    }

    /**
     * Create routes to handle api
     *
     * @return void
     */
    public function createApiRoutes()
    {
        $this->add( 'api.images.index', [
            'uri'=>'images',
            'method'=>'get',
            'as'=>'api.images.index',
            'uses'=>'\\' .ApiController::class . '@index',
        ] );
        $this->add( 'api.images.show', [
            'uri'=>'images/{image}',
            'method'=>'get',
            'as'=>'api.images.show',
            'uses'=>'\\' .ApiController::class . '@show',
        ] );
        $this->add( 'api.images.store', [
            'uri'=>'images',
            'method'=>'post',
            'as'=>'api.images.store',
            'uses'=>'\\' .ApiController::class . '@store',
        ] );
        $this->add( 'api.images.destroy', [
            'uri'=>'images/{image}',
            'method'=>'delete',
            'as'=>'api.images.destroy',
            'uses'=>'\\' .ApiController::class . '@destroy',
        ] );
    }



    /**
     * Create routes
     *
     * @return void
     */
    public function createRoutes()
    {

        $this->add( 'web.images.index', [
            'uri'=>'images',
            'method'=>'get',
            'as'=>'images.index',
            'uses'=>'\\' .ImagesController::class . '@index',
        ] );
        $this->add( 'web.images.store', [
            'uri'=>'images',
            'method'=>'post',
            'as'=>'images.store',
            'uses'=>'\\' .ImagesController::class . '@store',
        ] );
        $this->add( 'web.images.update', [
            'uri'=>'images/{image}',
            'method'=>'put',
            'as'=>'images.update',
            'uses'=>'\\' .ImagesController::class . '@update',
        ] );
        $this->add( 'web.images.destroy', [
            'uri'=>'images/{image}',
            'method'=>'delete',
            'as'=>'images.destroy',
            'uses'=>'\\' .ImagesController::class . '@destroy',
        ] );
        $this->add( 'web.images.download', [
            'uri'=>'images/{image}/download',
            'method'=>'post',
            'as'=>'images.download',
            'uses'=>'\\' .ImagesController::class . '@download',
        ] );
    }
}
