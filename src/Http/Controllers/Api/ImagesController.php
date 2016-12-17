<?php

namespace LasseHaslev\LaravelImage\Http\Controllers;

use LasseHaslev\LaravelImage\Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LasseHaslev\LaravelImage\Http\Requests\StoreImageRequest;
use Illuminate\Http\Request;

/**
 * Class ImagesController
 * @author Lasse S. Haslev
 */
class ImagesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view( 'images::index' )
            ->with( 'images', $images );
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
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $image)
    {
        $image = Image::find( $image );
        if ( $request->hasFile( 'image' ) ) {
            $image->uploadImage( $request->file( 'image' ) );
        }

        $image->update( $request->all() );
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $image )
    {
        $image = Image::find( $image );
        $image->delete();
        return redirect()->back();
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function download($image)
    {
        $image = Image::find( $image );
        return $image->download();
    }

}
