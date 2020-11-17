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
        return view('welcome')->with('products', $products);
    }

    public function products() {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('products')->with('products', $products);
    }
}
