<?php

use App\Http\Controllers\guest\OrderPaymentController;
use App\Http\Controllers\guest\WelcomeController;
use App\Http\Livewire\Guest\CreateOrder;
use App\Http\Livewire\Guest\ProductDetails;
use App\Http\Livewire\Guest\ProductList;
use App\Http\Livewire\Guest\ProductListSubcategory;
use App\Http\Livewire\Guest\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class)->name('home');
Route::get('products/{category}', ProductList::class)->name('products.category');
Route::get('products/{category}/{subcategory}', ProductList::class)->name('products.category.subcategory');
Route::get('product/{product}', ProductDetails::class)->name('product.details');
Route::get('cart', ShoppingCart::class)->name('shopping-cart');
Route::get('order/generate', CreateOrder::class)->name('order.generate');
Route::get('order/{order}/payment', OrderPaymentController::class)->name('order.payment');

/* Route::get('dashboard', function () {
    dd(Auth::user());
});
 */