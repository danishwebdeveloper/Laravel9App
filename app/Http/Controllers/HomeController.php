<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){

        $dishes = food::all();
        $chefs = Chef::all();
        return view('home',
            [
                'dishes' => $dishes,
                'chefs' => $chefs,
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
            return view('home');
        }
    }

}
