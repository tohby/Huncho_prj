<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        $count = Product::get()->count();
        return view('welcome')->with('products', $products)->with('count', $count);
    }

    public function products() {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('products')->with('products', $products);
    }

    public function search(Request $request){
        $this->validate($request, [
            'searchKey' => 'required',
        ]);

        $products = Product::search($request->searchKey)->paginate(12);
        return view('products')->with('products', $products)->with('searchKey', $request->searchKey);
    }

    public function buy($id) {
        $product = Product::findOrFail($id);
        return view('buy')->with('product', $product);
    }

    public function order(Request $request){

    }
}
