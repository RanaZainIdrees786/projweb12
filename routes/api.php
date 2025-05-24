<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;


Route::get('/users', function () {
    $users = User::all();
    return response()->json(data: $users);
});

Route::get('/products', function () {
    $products = Product::all();
    return response()->json(data: $products);
});

Route::post('/users', function (Request $request) {
    $query = $request->serachquery;
    $user = User::where(column: 'name', operator: $query)->first();
    if ($user) {
        return response()->json(['status' => 'success', 'message' => "user found successfully", 'data' => $user]);
    }
    return response()->json(['status' => 'error', 'message' => "user not found", 'data' => null]);
});


