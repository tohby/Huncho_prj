<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Feedback;
use App\User;
use App\Order;
use Auth;
use Illuminate\Support\Str;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Notifications\InvoicePaid;


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

    public function product($id) {
        $product = Product::find($id);
        $feedbacks = Feedback::where('product_id', $id)->get();
        return view('product_detail')->with('product', $product)->with('feedbacks', $feedbacks);
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

    public function profile(){
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function storeProfile(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->address = $request->address;
        // $user->email = $user->email;
        $user->save();

        return redirect('/profile')->with('success', 'Profile Updated successfully');
    }

    public function feedback_submit(Request $request) {
        $this->validate($request, [
            'productId' => ['required'],
            'feedback' => ['required'],
        ]);

        Feedback::Create([
            'user_id' => Auth::id(),
            'product_id' => $request->productId,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Your feedback has been submitted');
    }

    public function order(Request $request){

    }

    public function checkout(Request $request){
        $user_email = Auth::user()->email;
        $product = Product::find($request->productId);
        $user = Auth::user();
        $charge = Stripe::charges()->create([
            'amount' => $product->price,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Order',
            'receipt_email' => $user_email,
        ]);

        if($charge) {
            $order = Order::Create([
                'orderCode' => '#crtl'.rand(),
                'status' => 0,
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
        }

        $user->notify(new InvoicePaid($order));

        return back()->with('success', 'Thank you for your purchase! your payment was successful and an invoice was sent to your email.');
    }

    public function invoice($id) {
        $order = Order::find($id);
        return view('invoice')->with('order', $order);
    }
}
