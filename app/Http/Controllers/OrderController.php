<?php
namespace App\Http\Controllers;

use App\Entities\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders(Request $request)
    {
        $orders = Order::with('orderProducts.product.vendor', 'partner')->paginate();

        return view('orders.index', compact('orders'));
    }
}
