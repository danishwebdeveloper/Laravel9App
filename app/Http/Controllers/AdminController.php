<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Http\Requests\TableReservation;
use App\Models\Chef;
use App\Models\food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
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

    public function foodmenu()
    {
        return view('admin.foodmenu');
    }

    public function uploads(FoodRequest $request)
    {
        // Validations
        $validator = $request->validated();
        $food = food::create($validator);

        $food->title = $request->title;
        $food->price = $request->price;

        // Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalName();
            $location = 'storage/imagesupload';
            $file->move($location, $filename);
            $food->image = $filename;
        }

        $food->description = $request->description;

        $food->save();
        return redirect(url('/adminhome'))->with('success', 'Food Added Successfully!');

    }

    public function updateView($id)
    {
        $food = food::find($id);
        return view('admin.updateview', compact('food'));
    }

    public function completed($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect('/reservationView')->with('success', 'Order Completed!');
    }

    public function updatefood(Request $request, $id)
    {
        // dd($id);
        $food = food::find($id);
        $food->title = $request->title;
        $food->price = $request->price;

        // Image Upload
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalName();
        $location = 'storage/imagesupload';
        $file->move($location, $filename);
        $food->image = $filename;
        $food->description = $request->description;
        $food->save();
        return redirect(url('/adminhome'))->with('success', 'Food Updated Successfully!');
    }

    public function show()
    {
        $foods = food::all();
        return view('admin.showFood', compact('foods'));
    }

    public function reservation(TableReservation $request)
    {

        $validator = $request->validated();
        $reservation = Reservation::create($validator, $request->all());

        // $reservation->name = $request->name;
        // $reservation->email = $request->email;
        // $reservation->number = $request->number;
        // $reservation->persons = $request->persons;
        // $reservation->date = $request->date;
        // $reservation->time = $request->time;
        // $reservation->message = $request->message;

        $reservation->save();
        return redirect('/')->with('success', "Your Successfully Reserved The Table!!");
    }

    public function reservationView()
    {
        $reservations = Reservation::all();
        return view('admin.reservationView', compact('reservations'));
    }

    public function deleteFood($id)
    {
        $food = food::find($id);
        $food->delete();
        return redirect('/foodmenu')->with('success', 'Deleted Food Successfully!');
    }

    public function viewChefs()
    {
        $chefs = Chef::all();
        return view('admin.viewchefs', compact('chefs'));
    }

    public function addChef(Request $request)
    {
        $addChef = new Chef();
        $addChef->name = $request->name;

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $location = 'storage/imagesupload';
        $file->move($location, $fileName);
        $addChef->image = $fileName;

        $addChef->cheftype = $request->chefoption;
        $addChef->save();

        return redirect()->back()->with('success', 'Chef Added Successfully!!');
    }

    public function deleteChef($id)
    {
        $chefdelete = Chef::find($id);
        $chefdelete->delete();
        return redirect()->back()->with('success', 'Chef Deleted Successfully!');
    }

    public function updateViewChef($id)
    {
        $chef = Chef::find($id);
        return view('admin.updatechefs', compact('chef'));
    }

    public function updateChef(Request $request, $id)
    {
        $addChef = Chef::find($id);
        $addChef->name = $request->name;

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $location = 'storage/imagesupload';
        $file->move($location, $fileName);
        $addChef->image = $fileName;

        $addChef->cheftype = $request->chefoption;
        $addChef->save();

        return redirect()->back()->with('success', 'Chef Updated Successfully!!');
    }

    public function customerOrder()
    {
        $foodOrders = Order::all();
        return view('admin.orderView', compact('foodOrders'));
    }

    public function searchOrder(Request $request)
    {
        $search = $request->searchOrder;
        $foodOrders = Order::where('foodname', 'LIKE', '%' . $search . '%')
            ->orwhere('username', 'LIKE', '%' . $search . '%')
            ->get();
        return view('admin.orderView', compact('foodOrders'));
    }
}