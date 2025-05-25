<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function indexPage()
    {
        $products = Product::all();
        return view('admin.index')->with('products', $products);
    }

    public function masterPage()
    {

        return view('admin.master');
    }
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
           if ($product->image != "") {
            // delete associated image file
            File::delete(public_path('products/' . $product->image));
        }
        $product->delete();
        return redirect()->back();
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('admin.producteditform')->with('product', $product);

    }


    public function shopDetailPage($id){
        $product = Product::findOrFail($id);
        return view('web.shopdetail')->with(['product' => $product]);

    }

    public function updateProduct($id, Request $request){
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // delete old image
            File::delete(public_path('products/' . $product->image));

            // Create new image file name
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique Image Name

            //save image to the public directory
            $image->move(public_path('products/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }
        return redirect()->route('admin-index');
    }

    public function prodCreateForm()
    {
        return view('admin.productcreateform');
    }

    public function createProduct(Request $request)
    {
        // dd($request);
        $new = new Product();
        $new->name = $request->name;
        $new->price = $request->price;
        $new->description = $request->description;
        $new->save();

        // if image is uploaded the product data
        if($request->image != " "){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension(); // jpg
            $imageName = time() . "." . $ext; // Unique image name; 839337.jpg

            // save image to products directory
            $image->move(public_path() . "/products/", $imageName);

            // save image in the database
            $new->image = $imageName;
            $new->save();
        }

        return redirect()->route("admin-index");
    }
}
