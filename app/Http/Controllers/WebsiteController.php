<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class WebsiteController extends Controller
{
    //
    public function indexPage()
    {
        // $products = Product::all(); // select * from products
        // return view('index')->with('products', $products);

        return redirect()->route('fruitable-index');
    }
    public function homePage()
    {
        // hard coded data
        // $usersdata = ["zain", 'ali', 'hamid'];
        $usersdata = User::all();
        return view('home')->with('users', $usersdata);
    }

    public function userDelete($id, Request $request)
    {
        // finding relevant user from the database
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
    function submitForm(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = "pak12345";
        $user->save();
        return redirect()->route('web-home');
    }

    function editFormPage($id)
    {
        // finding relevant user from the database
        $user = User::findOrFail($id);
        // dump($user);
        return view('editForm')->with("user", $user);

    }

    function updateUser($id, Request $request)
    {
        // find user in the database
        $user = User::findOrFail($id);

        // used data coming from form request to replace the old data
        $user->name = $request->name;
        $user->email = $request->email;

        // user data updated in db
        $user->save();

        // redirected user to home page
        return redirect()->route('web-home');
    }

}
