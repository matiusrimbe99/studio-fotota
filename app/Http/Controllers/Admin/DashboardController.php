<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Packet;
use App\Models\Studio;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $titleApp = 'Dashboard';
        $users = User::where('role_id', 2);
        $countUsers = $users->count();
        $order = Order::where('status_order_id', 2);
        $countOrders = $order->count();
        $orderPayment = Order::where('status_order_id', 4);
        $countOrderPayment = $orderPayment->count();
        $orderFullPayment = Order::where('status_order_id', 6);
        $countorderFullPayment = $orderFullPayment->count();
        $orderSuccess = Order::where('status_order_id', 7);
        $countOrderSuccess = $orderSuccess->count();

        $orders = Order::all();
        $countAllOrders = $orders->count();

        $countPacket = Packet::all()->count();
        $countStudio = Studio::all()->count();

        return view('admin/dashboard', compact('countUsers', 'countOrders', 'countOrderPayment', 'countorderFullPayment', 'countOrderSuccess', 'countAllOrders', 'countPacket', 'countStudio', 'titleApp'));
    }
}
