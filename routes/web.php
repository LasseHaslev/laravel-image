<?php

use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;
use LasseHaslev\LaravelImage\Http\ImageRouter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;
Route::group( [ 'prefix'=>config( 'laravelimage.routes' ) ], function () {
    $router = ImageRouter::get();
    $router->routes();
});

Route::group( [ 'prefix'=>'api' ], function ()
{
    $router = ImageRouter::get();
    $router->routes( 'api' );
} );
