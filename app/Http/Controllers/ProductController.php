<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();      
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);

            $product = new Product;
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->image = $filename;
            $product->description = $request->description;
            $product->save();
            return redirect('/product')->with ('success','Product has been Created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'image' => 'required',
        ]);

        $product = Product::find($product->id);

        if ($request->hasFile('image')){
            \File::delete($product['image']);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); 
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);

            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->image = $filename;
            $product->description = $request->description;
            $product->save();
            return redirect('/product')->with ('success','Product has been Edited successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->forceDelete();
        return redirect('/product')->with('success','Product has been deleted successfully');
    }
}
