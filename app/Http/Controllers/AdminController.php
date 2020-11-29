<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\User;

class AdminController extends Controller
{
    /**
     * 
     * Create a new controller instance.
     * User must be logged in to access controller
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirect logged in user to admin dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status', 0)->get();
        $customers = User::where('role', 2)->count();
        $products = Product::count();
        return view('admin')->with('orders', $orders)->with('products', $products)->with('customers', $customers);
    }
}
