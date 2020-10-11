<?php

namespace App\Http\Controllers;

use App\Products;
use App\Images;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','open']]);
    }

    public function index()
    {
        $products = Products::all();
        $category = Category::all();
        return view('welcome')->with([
            'products'=>$products,
            'category'=>$category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $product = new Products();
        $product->user_id = auth()->user()->id;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->categories_id = $request->input('category');
        $product->save();
        $product_id = $product->id;

        

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
        
        return redirect('/open/'.$product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        
        $product_id = $products->id;
        $category_id = $products->categories_id;
        $category = Category::find($category_id);
        $image = DB::table('images')->where('products_id',$product_id)->first();
        return view('admin.product',compact('products'),compact('image'))->with('category',$category);
        //return $image->image;
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        $category_id = $products->categories_id;
        $category = Category::find($category_id);
        return view('admin.edit',compact('products'))->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $products->update($request->all());
        return redirect('/edit/'.$products->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();
        return redirect('/allproducts');
    }

    public function open(Products $products)
    {
        
        $product_id = $products->id;
        $category_id = $products->categories_id;
        $category = Category::find($category_id);
        $image = DB::table('images')->where('products_id',$product_id)->first();
        return view('single',compact('products'),compact('image'))->with('category',$category);
        //return $image->image;
 
    }
}
