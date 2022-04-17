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

        // Image Upload
        $file = $request->file('image');
        $filename = time().'.'. $file->getClientOriginalName();
        $location = 'storage/imagesupload';
        $file->move($location, $filename);
        $food->image = $filename;

        $food->description =  $request->description;
        $food->save();

        return redirect(url('/adminhome'))->with('success', 'Food Added Successfully!');
    }

    public function updateView($id)
    {
        $food = food::find($id);
        return view('admin.updateview', compact('food'));



    }

    public function updatefood(Request $request, $id)
    {
        // dd($id);
        $food = food::find($id);
        $food->title = $request->title;
        $food->price = $request->price;

        // Image Upload
        $file = $request->file('image');
        $filename = time().'.'. $file->getClientOriginalName();
        $location = 'storage/imagesupload';
        $file->move($location, $filename);
        $food->image = $filename;
        $food->description =  $request->description;
        $food->save();
        return redirect(url('/adminhome'))->with('success', 'Food Updated Successfully!');
    }


    public function show(){
        $foods = food::all();
        return view('admin.showFood', compact('foods'));
    }

    public function deleteFood($id)
    {
        $food = food::find($id);
        $food->delete();
        return redirect('/foodmenu')->with('success', 'Deleted Food Successfully!');
    }
}
