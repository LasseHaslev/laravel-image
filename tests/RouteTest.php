<?php

use LasseHaslev\LaravelImage\Image;

/**
 * Class ViewTest
 * @author Lasse S. Haslev
 */
class ViewTest extends TestCase
{
    /**
     * @var mixed
     */
    protected $file;
    protected $textFile;

    /**
     * Setup data for each test
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->file = $this->setupUploadFile( 'kitten.jpg', '.jpg', 'image/jpeg' );
        $this->textFile = $this->setupUploadFile( 'text.txt', '.txt', 'text/plain' );
    }

    protected function setupUploadFile( $originalName, $extension, $mime_type )
    {
        $stub = __DIR__ . '/_files/' . $originalName;
        $name = str_random(8) . $extension;
        $path = sys_get_temp_dir() . '/'  . $name;
        $type = $mime_type;

        copy( $stub, $path );

        return new Illuminate\Http\UploadedFile($path, $originalName, $type, filesize($path), null, true);
    }

    /** @test */
    public function default_config_for_routes_are_false() {
        $this->assertTrue( config( 'laravelimage.routes' ) !== null);
        $this->assertEquals( '/', config( 'laravelimage.routes' ) );
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
