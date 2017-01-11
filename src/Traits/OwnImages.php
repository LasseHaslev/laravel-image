<?php

namespace LasseHaslev\LaravelImage\Traits;

use LasseHaslev\LaravelImage\Image;

/**
 * Trait OwnImages
 * @author Lasse S. Haslev
 */
trait OwnImages
{
    /**
     * Connect this provider as owner to images
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images()
    {
        return $this->morphMany( Image::class, 'ownerable', 'owner_type', 'owner_id' );
    }
}
