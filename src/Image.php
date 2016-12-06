<?php

namespace LasseHaslev\LaravelImage;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @author Lasse S. Haslev
 */
class Image extends Model {

    protected $table = 'images';

    protected $fillable = [
        'alt',
    ];

    /**
     * Upload and create a new instance
     *
     * @return void
     */
    public static function upload( UploadedFile $file )
    {

        $path = $file->store( 'images' );

        list( $width, $height) = getimagesize( $file );
        $image = new static();

        $image->path = $path;

        $image->original_name = $file->getClientOriginalName();
        $image->extension = $file->getClientOriginalExtension();
        $image->mime_type = $file->getMimeType();
        $image->size = $file->getClientSize();
        $image->width = $width;
        $image->height = $height;

        $image->save();

        return $image;
    }

    /**
     * Get the full path to the image
     *
     * @return string
     */
    public function path()
    {
        return $this->path();
    }


}
