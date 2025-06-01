<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\LogRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\FruitableController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MyAuthController;


// Route::get('/', [WebsiteController::class, 'indexPage'])->name('web-index');
Route::get("/", [MyAuthController::class, 'loginPage'])->name('login-page');
Route::get('/home', [WebsiteController::class, 'homePage'])->name('web-home');
Route::post("/submitform", [WebsiteController::class, 'submitForm'])->name('web-submitform');

// /user/delete/1
// /user/delete/2
// /user/delete/3

// CRUD Creation, Read, Update, Deletion
Route::get('/user/delete/{id}', [WebsiteController::class, 'userDelete'])->name('web-user-delete');
Route::get('/user/edit/{id}', [WebsiteController::class, 'editFormPage'])->name('web-user-edit-form');
Route::post('/user/update/{id}', [WebsiteController::class, 'updateUser'])->name('web-user-update');

// Fruitables Routes
Route::get('/fruitable/master', [FruitableController::class, 'masterPage'])->name('fruitable-master');
Route::get('/fruitable/index', [FruitableController::class, 'indexPage'])
    ->name('fruitable-index')
    // ->middleware(LogRequest::class);
;
Route::get('/fruitable/shop', [FruitableController::class, 'shopPage'])->name('fruitable-shop');
Route::get("/fruitale/shopdetail/{id}",[AdminController::class, 'shopDetailPage'])->name('fruitable-shop-detail');

Route::get('/fruitable/singleProduct', [FruitableController::class, 'singleProduct'])->name(name: 'fruitable-single-product');
Route::middleware('auth')->group(function () {
    Route::get('/fruitable/cart', [FruitableController::class, 'cartPage'])->name('fruitable-cart');
    Route::get('/fruitable/checkout', [FruitableController::class, 'checkoutPage'])->name('fruitable-checkout');
    Route::get('fruitable/addtocart/{id}',[FruitableController::class, 'addtoCart'])->name('fruitable-addtocart');
    Route::get('fruitable/showcart',[FruitableController::class, 'showCart'])->name('fruitable-showcart');
});

Route::get('/fruitable/contact', [FruitableController::class, 'contactPage'])->name('fruitable-contact');
Route::get('fruitable/removefromcart/{id}',[FruitableController::class, 'removeFromCart'])->name('fruitable-removefromcart');
// Admin Panel Routes


Route::get('/loginuser',[MyAuthController::class, "loginPage"])->name('login-page');
Route::post('/loginuser',[MyAuthController::class, "login"])->name('login');
Route::get('/registerpage',[MyAuthController::class, "registerPage"])->name('register-page');
Route::post('/register',[MyAuthController::class, "register"])->name('register');
Route::get('/logout',[MyAuthController::class, "logout"])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/admin/index', [AdminController::class, 'indexPage'])->name('admin-index');
    Route::get('/admin/master', [AdminController::class, 'masterPage'])->name('admin-master');
    Route::get('admin/product/edit/{id}', [AdminController::class, 'editProduct'])->name('admin-product-edit');
    Route::get('admin/product/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin-product-delete');
    Route::get('admin/product/createFrom', [AdminController::class, 'prodCreateForm'])->name('admin-product-create-form');
    Route::post('admin/product/createProduct', [AdminController::class, 'createProduct'])->name('admin-create-product');
    Route::post('admin/product/updateProduct/{id}', [AdminController::class, 'updateProduct'])->name('admin-update-product');
});
