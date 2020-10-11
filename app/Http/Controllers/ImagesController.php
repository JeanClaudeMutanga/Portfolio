<?php

namespace App\Http\Controllers;

use App\Images;
use App\Products;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Products $products)
    {

        return view('admin.addpictures',compact('products'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Products $products,Request $request)
    {
        $product_id=  $products->id;
        foreach(request('images') as $picture){
            $imagePath = $picture->store('uploads','public');
    
            //$imagePath = request('images')->store('uploads','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();
            
            $item = new Images();
            $item->image = $imagePath;
            $item->products_id = $product_id;
            $item->save();
            
            }
            
            return redirect('/edit/'.$product_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        $product_id = $images->products_id;
        $images->delete();
        return redirect('/edit/'.$product_id);
    }
}
