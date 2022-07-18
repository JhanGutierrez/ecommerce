<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{
    public function __invoke(Order $order)
    {
        $content = json_decode($order->content);
        return View('guest.payment', compact('order', 'content'));
    }
}
