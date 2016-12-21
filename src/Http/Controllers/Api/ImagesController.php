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
        $images = Image::all();
        return $this->response->collection( $images, new ImageTransformer );
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Image $image )
    {
        $image = Image::find( $image );
        $image->delete();
        return redirect()->back();
    }

}
