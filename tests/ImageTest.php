<?php

use LasseHaslev\LaravelImage\Image;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class ImageTest
 * @author Lasse S. Haslev
 */
class ImageTest extends TestCase
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
    public function is_returning_an_instance_when_calling_upload_function() {
        $image = Image::upload( $this->file );
        $this->assertInstanceOf( Image::class, $image );
    }
    /** @test */
    public function is_setting_properties_when_calling_upload_function() {
        $image = Image::upload( $this->file );
        // dd( $image );
        $this->assertEquals( 'kitten.jpg', $image->original_name );
        $this->assertEquals( 'image/jpeg', $image->mime_type );
        $this->assertTrue( (bool) $image->size );
        $this->assertEquals( 300, $image->width );
        $this->assertEquals( 200, $image->height );
    }
    /** @test */
    public function can_upload_new_image() {
        $image = Image::upload( $this->file );
        $this->assertTrue( isset( $image->path ) );
        // $this->assertFileExists( $image->path() );
    }

    // Must be of type image
    /** @test */
    public function uploaded_file_must_be_of_type_image() {
        $this->expectException( HttpException::class );
        $image = Image::upload( $this->textFile );
    }
    // Can set owner
    // Can set what folder to store to
    /** @test */
    public function has_config_for_where_to_store_images() {
        $this->assertEquals( 'images', config( 'laravelimage.folder' ) );
    }
    // Can update image content $image->updateImage();
    /** @test */
    public function can_update_image_content_of_existing_image() {
        $image = Image::upload( $this->file );

        $updatedFile = $this->setupUploadFile( 'kitten2.jpg', '.jpg', 'image/jpeg' );

        $image->uploadImage( $updatedFile );

        $this->assertEquals( 'kitten2.jpg', $image->original_name );
    }

    /** @test */
    public function can_get_url_of_image_element() {
        $image = Image::upload( $this->file );
        $this->assertTrue( (bool) filter_var($image->url(), FILTER_VALIDATE_URL) );
        $this->assertEquals( url( $image->path ), $image->url() );
    }

    /** @test */
    public function can_get_full_path_of_image_element() {
        $image = Image::upload( $this->file );
        $this->assertEquals( storage_path( $image->path ), $image->path() );
    }
    // Is keeping owner when updating
    // Owner is referencing to id of class set in config
    // cannot access owner if config owner is set to null
    // Can set owner
    // Can remove owner
    // Can delete image
    // Can get relative path of image
    // Can get path of image
    // Can get full path of image

    // Can download original image
}
