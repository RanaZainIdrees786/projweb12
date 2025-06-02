<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
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


    public function addtoCart($id)
    {
        $product = Product::findOrFail($id);

        // $cart = [
        //     '9' => ['name'=> 'strawberries', 'image'=>'893399.jpg','description'=>'some dummy description','price'=>8393 ,'quantity' => 3,'subtotal' => 8393 * 3],
        //     '11' => ['name'=> 'Bananas', 'image'=>'893399.jpg','description'=>'some dummy description', 'price'=>100, 'qunantity' => 24],
        // ]

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
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

    public function showCart()
    {
        $cart = session()->get('cart');
        dd($cart);

    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'item removed successfully');
        } else {
            return redirect()->back()->withErrors('item does not exist in the cart');
        }
    }

    function storeOrder(Request $request)
    {
        // Example input structure:
        // $request->user_id = 1;
        // $request->products = [
        //     ['product_id' => 2, 'quantity' => 3],
        //     ['product_id' => 5, 'quantity' => 1],
        // ];

        // This code needs revision
        $cart = session('cart');
        $user_id = $request->user_id;



        DB::beginTransaction();

        try {
            // 1. Create the order
            $order = Order::create([
                'user_id' => $request->user_id,
                'status' => 'pending',
            ]);

            // 2. Prepare data for pivot table
            $productData = [];
            foreach ($request->products as $item) {
                $productData[$item['product_id']] = ['quantity' => $item['quantity']];
            }

            // 3. Attach products to order
            $order->products()->attach($productData);

            DB::commit();

            return response()->json(['message' => 'Order created successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
