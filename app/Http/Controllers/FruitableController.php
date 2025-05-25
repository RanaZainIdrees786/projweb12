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


    public function addtoCart($id){
        $product = Product::findOrFail($id);

        // $cart = [
        //     '9' => ['name'=> 'strawberries', 'image'=>'893399.jpg','description'=>'some dummy description','price'=>8393 ,'quantity' => 3,'subtotal' => 8393 * 3],
        //     '11' => ['name'=> 'Bananas', 'image'=>'893399.jpg','description'=>'some dummy description', 'price'=>100, 'qunantity' => 24],
        // ]

        $cart = session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function showCart(){
        $cart = session()->get('cart');
        dd($cart);

    }

}
