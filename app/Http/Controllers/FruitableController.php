<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class FruitableController extends Controller
{
    //
    public function masterPage()
    {
        return view('web.master');
    }
    public function indexPage()
    {
        return view('web.index');
    }
    public function shopPage()
    {
        $products = Product::all();
        return view('web.shop')->with('products', $products);
    }
    public function singleProduct()
    {

        return "not implemented";
    }
    public function cartPage()
    {
        return view('web.cart');

    }
    public function checkoutPage()
    {
        return view('web.checkout');
    }

    public function contactPage()
    {
        return view('web.contact');
    }

}
