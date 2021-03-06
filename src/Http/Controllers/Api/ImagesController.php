<?php

namespace LasseHaslev\LaravelImage\Http\Controllers\Api;

use LasseHaslev\LaravelImage\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LasseHaslev\LaravelImage\Http\Requests\StoreImageRequest;
use Illuminate\Http\Request;

use LasseHaslev\ApiResponse\Responses\ResponseTrait;
use LasseHaslev\LaravelImage\Http\Transformers\ImageTransformer;

/**
 * Class ImagesController
 * @author Lasse S. Haslev
 */
class ImagesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy( 'updated_at', 'DESC' )->get();
        return $this->response->collection( $images, new ImageTransformer );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageRequest $request)
    {
        $image = Image::upload( $request->file( 'image' ) );
        return $this->response->item( $image, new ImageTransformer );
    }

    /**
     * Show a spesific model
     *
     * @return response
     */
    public function show(Image $image)
    {
        return $this->response->item( $image, new ImageTransformer );
    }

}
