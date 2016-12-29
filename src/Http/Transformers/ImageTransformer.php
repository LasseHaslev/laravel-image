<?php

namespace LasseHaslev\LaravelImage\Http\Transformers;

use LasseHaslev\ApiResponse\Transformers\BaseTransformer;

/**
 * Class ImageTransformer
 * @author Lasse S. Haslev
 */
class ImageTransformer extends BaseTransformer
{
    /**
     * Transform model for api
     *
     * @return array
     */
    public function transform($model)
    {
        return [
            "id"=>$model->id,
            "original_name"=>$model->original_name,
            "alt"=>$model->alt,
            "path"=>$model->path,
            "url"=>$model->url(),
            "extension"=>$model->extension,
            "size"=>$model->size,
            "readable_size"=>$model->readableSize(0),
            "mime_type"=>$model->mime_type,
            "width"=>$model->width,
            "height"=>$model->height,
            "created_at"=>(string)$model->created_at,
            "updated_at"=>(string)$model->updated_at,
        ];

    }

}
