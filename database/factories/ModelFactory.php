<?php

use LasseHaslev\LaravelImage\Image;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
| Check out https://laravel.com/docs/5.3/database-testing#writing-factories for any questions
*/


$factory->define( Image::class, function (Faker\Generator $faker)
{
    return [
        'original_name'=>$faker->name,
        'alt'=>$faker->sentence,
        'path'=>str_random( 30 ),
        'extension'=>'jpg',
        'mime_type'=>'image/jpeg',
        'size'=>$faker->numberBetween( 500,3000 ),
        'width'=>$faker->numberBetween( 500,3000 ),
        'height'=>$faker->numberBetween( 500,3000 ),
    ];
} );
