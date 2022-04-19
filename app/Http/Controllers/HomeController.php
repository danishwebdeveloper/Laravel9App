<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){

        $dishes = food::all();
        $chefs = Chef::all();
        $userid = Auth::id();
        $counts = Cart::where('user_id', $userid)->count();
        return view('home',
            [
                'dishes' => $dishes,
                'chefs' => $chefs,
                'counts' => $counts,
            ]
        );
    }


    // Redirects Route
    public function redirects(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.adminhome');
        }
        else{
            $userid = Auth::id();
            $counts = Cart::where('user_id', $userid)->count();
            return view('home', compact('counts'));
        }
    }

    // Add to Cart
    public function addtoCart(Request $request,$id)
    {
        // Store User_id , Food_id and quantity
        $userId = Auth::id();
        $foodId = $id;
        $cart = new Cart();

        if(Auth::id()){
            $cart->user_id = $userId;
            $cart->food_id = $foodId;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('/login');
        }
    }

    public function showCart(Request $request, $id)
    {
        $count = Cart::where('user_id', $id)->count();
        $deleteData = Cart::select('*')->where('user_id', '=', $id)->get();

        $cartOrders = Cart::where('user_id', $id)->join('food', 'food_id', '=' , 'food.id')->get();

        return view('viewcart', [
            'count' => $count,
            'carOrders' => $cartOrders,
            'deleteData' => $deleteData,
        ]);
    }

    public function deleteCartItem($id){
        $delete = Cart::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Item Deleted!!');
    }

    public function orderConfirmation(Request $request)
    {

        foreach($request->foodname as $key=>$food){
            $order = new Order();
            $order->foodname = $food;
            $order->price = $request->price[$key]; //for every foodname give his price (using index)
            $order->quantity = $request->quantity[$key];

            $order->username = $request->name;
            $order->cellphone = $request->num;
            $order->address = $request->address;
            $order->save();
        }
        return redirect()->back()->with('success', 'Ordered Successfully!');
    }

}
