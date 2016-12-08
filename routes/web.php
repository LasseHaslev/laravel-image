<?php

use LasseHaslev\LaravelImage\Http\Controllers\ImagesController;
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
    Route::get( 'ImagesControllerimages', sprintf( '%s@index', ImagesController::class ) )->name( 'images.index' );
    Route::post( 'images/store', sprintf( '%s@store', ImagesController::class ) )->name( 'images.store' );
    Route::put( 'images/{image}', sprintf( '%s@update', ImagesController::class ) )->name( 'images.update' );
    Route::delete( 'images/{image}', sprintf( '%s@destroy', ImagesController::class ) )->name( 'images.destroy' );
    Route::post( 'images/{image}/download', sprintf( '%s@download', ImagesController::class ) )->name( 'images.download' );
});
