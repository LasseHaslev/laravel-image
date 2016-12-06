<?php

/**
 * Class ImageTest
 * @author Lasse S. Haslev
 */
class ImageTest extends TestCase
{
    /**
     * Setup data for each test
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $_FILES = array(
            'image'    =>  array(
                'name'      =>  'kitten.jpg',
                'tmp_name'  =>  __DIR__ . '/_files/kitten.jpg',
                'type'      =>  'image/jpeg',
                'size'      =>  499,
                'error'     =>  0
            )
        );

    }

    // Can upload file Image::upload($filename, $parent);
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
}
