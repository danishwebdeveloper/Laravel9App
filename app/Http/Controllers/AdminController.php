<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // dd('hoo');
        return view('admin.adminhome');
    }

    public function users()
    {
        // Get All Users
        $users = User::all();
        return view('admin.adminusers', compact('users'));
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
