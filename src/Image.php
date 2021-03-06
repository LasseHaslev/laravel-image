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

        if ( strpos( $file->getClientMimeType(), 'image' ) === false ) {
            abort( 500, 'The file you tried to upload is not of type image/*' );
        }

        $image = new static();
        $image->uploadImage( $file );
        return $image;

    }

    /**
     * Upload image to image element
     *
     * @return static
     */
    public function uploadImage( UploadedFile $file )
    {
        $path = $file->store( config( 'laravelimage.folder' ), 'public' );

        if ( ! $path ) {
            abort( 500, 'Cannot upload image' );
        }

        list( $width, $height) = getimagesize( $file );

        $this->path = $path;

        $this->original_name = $file->getClientOriginalName();
        $this->extension = $file->getClientOriginalExtension();
        $this->mime_type = $file->getMimeType();
        $this->size = $file->getClientSize();
        $this->width = $width;
        $this->height = $height;

        $this->save();

        return $this;
    }

    /**
     * Get the full path to the image
     *
     * @return string
     */
    public function path()
    {
        return storage_path( 'app/public/' . $this->path );
    }

    /**
     * Get the url
     *
     * @return string
     */
    public function url()
    {
        return asset( 'storage/' . $this->path );
        return url( $this->path );
    }

    /**
     * Download file
     *
     * @return response
     */
    public function download()
    {
        return response()->download( $this->path(), $this->original_name );
    }


    /**
     * Get readable size of size
     *
     * @return string
     */
    public function readableSize( int $decimals = 2 )
    {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($this->size) - 1) / 3);
        return sprintf("%.{$decimals}f", $this->size / pow(1024, $factor)) . @$size[$factor];
    }



}
