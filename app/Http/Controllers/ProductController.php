<?php

namespace App\Http\Controllers;

use App\Product;
use App\Brand;
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
        $products = Product::orderBy('created_at', 'desc')->paginate(6);
        return view('products/index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name', 'ASC')->get();
        return view('products/create')->with('brands', $brands);
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
            'name' => 'required:unique:products',
            'desc' => 'required',
            'color' => 'required',
            'transmission' => 'required',
            'engine' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'image' => 'required|image',
        ]);
        
        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/cars', $fileNameToStore);
        }

        Product::Create([
            'name' => $request->name,
            'desc' => $request->desc,
            'color' => $request->color,
            'transmission' => $request->transmission,
            'engine' => $request->engine,
            'price' => $request->price,
            'brand_id' => $request->brand,
            'image' => $fileNameToStore,
        ]);
        
        return redirect('/admin/products')->with('success', 'New product addedd successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return abort(404);
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
        $brands = Brand::orderBy('name', 'ASC')->get();
        return view('products/edit')->with('product', $product)->with('brands', $brands);
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
            'name' => 'required',
            'desc' => 'required',
            'color' => 'required',
            'transmission' => 'required',
            'engine' => 'required',
            'price' => 'required',
            'brand' => 'required',
            'image' => 'required|image',
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/cars', $fileNameToStore);
        }

        $product = Product::find($product->id);
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->color = $request->color;
        $product->transmission = $request->transmission;
        $product->engine = $request->engine;
        $product->price = $request->price;
        $product->brand_id = $request->brand;
        $product->image = $fileNameToStore;
        $product->save();

        return redirect('/admin/products')->with('success', 'Your Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product->id);
        $product->delete();

        return redirect('/admin/products')->with('success', 'Your product has been Deleted');
    }
}
