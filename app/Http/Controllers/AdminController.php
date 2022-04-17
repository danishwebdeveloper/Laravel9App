<?php

namespace App\Http\Controllers;

use App\Models\food;
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

    public function foodmenu(){
        return view('admin.foodmenu');
    }

    public function uploads(Request $request){

        $food = new food();
        $food->title = $request->title;
        $food->price = $request->price;

        // Image upload
        $path = public_path('/imagesUpload');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');
        $fileName = uniqid() . '.' . trim($file->getClientOriginalName());
        $food->image = $file;
        $file->move($path, $fileName);
        
        $food->description =  $request->description;
        $food->save();

        return redirect(url('/adminhome'))->with('success', 'Food Added Successfully!');
    }


}
