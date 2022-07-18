<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    /**
     * Displays the main view
     *
     * @return void
     */
    public function __invoke()
    {
        $products = Product::latest()->take(4)->get();
        return view('guest.home', compact('products'));
    }
}
