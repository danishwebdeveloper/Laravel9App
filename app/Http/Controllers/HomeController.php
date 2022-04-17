<?php

namespace App\Http\Controllers;

use App\Models\food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $dishes = food::all();
        // dd($dishes);
        return view('home', compact('dishes'));
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
