<?php

use LasseHaslev\LaravelImage\Image;

/**
 * Class ViewTest
 * @author Lasse S. Haslev
 */
class ViewTest extends TestCase
{
    /** @test */
    public function default_config_for_routes_are_false() {
        $this->assertTrue( config( 'laravelimage.routes' ) !== null);
        // $this->assertEquals( true, config( 'laravelimage.routes' ) );
    }

    /** @test */
    public function has_route_for_listing_images() {
        $image = factory( Image::class )->create();
        $this->visitRoute( 'images.index' )
            ->see( 'action="' . route( 'images.store' ) . '"' )
            ->see( 'action="' . route( 'images.update', $image->id ) . '"' )
            ->see( 'action="' . route( 'images.destroy', $image->id ) . '"' );
    }
}
