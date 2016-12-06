<?php

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

    /**
     * Setup data for each test
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->setupTestImage();
    }
    /**
     * undocumented function
     *
     * @return void
     */
    protected function setupTestImage()
    {
        $stub = __DIR__ . '/_files/kitten.jpg';
        $originalName = 'kitten.jpg';
        $name = str_random(8) . '.jpg';
        $path = sys_get_temp_dir() . '/'  . $name;
        $type = 'image/jpeg';

        copy( $stub, $path );

        $this->file = new Illuminate\Http\UploadedFile($path, $originalName, $type, filesize($path), null, true);
    }


    /** @test */
    public function can_upload_new_image() {
        // dd( $this->file );
    }

    // Can upload file Image::upload($filename, $parent);
    // Must be of type image
    // Can set what folder to store to
    // Can set owner when uploading
    // Is setting image info when uploading
        // name
        // size
        // width
        // type
    // Can update image content $image->updateImage();
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
