<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Packet;
use App\Models\Studio;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $titleApp = 'Pesanan Masuk';
        $orders = Order::where('status_order_id', 2)->get();
        return view('admin/order', compact('orders', 'titleApp'));
    }

    public function listAllOrder()
    {
        $titleApp = 'Semua Pesanan';
        $orders = Order::all();
        return view('admin/all-order', compact('orders', 'titleApp'));
    }

    public function listOrderPayments()
    {
        $titleApp = 'Pembayaran';
        $orders = Order::where('status_order_id', 4)->get();
        return view('admin/payment-order', compact('orders', 'titleApp'));

    }

    public function listOrderFullPayments()
    {
        $titleApp = 'Pesanan Lunas';
        $orders = Order::where('status_order_id', 6)->get();
        return view('admin/fullpayment-order', compact('orders', 'titleApp'));
    }

    public function listOrderCompleted()
    {
        $titleApp = 'Pesanan Selesai';
        $orders = Order::where('status_order_id', 7)->get();
        return view('admin/completed-order', compact('orders', 'titleApp'));
    }

    public function showAllOrder($id)
    {
        $titleApp = 'Semua Pesanan';
        $order = Order::where('id', $id)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('admin/detail-all-order', compact('order', 'titleApp'));

    }

    public function show($id)
    {
        $titleApp = 'Pesanan Masuk';
        $order = Order::where('id', $id)->where('status_order_id', 2)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('admin/detail-order', compact('order', 'titleApp'));
    }

    public function showPayment($id)
    {
        $titleApp = 'Pembayaran';
        $order = Order::where('id', $id)->where('status_order_id', 4)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('admin/detail-payment-order', compact('order', 'titleApp'));

    }

    public function showFullPayment($id)
    {
        $titleApp = 'Pesanan Lunas';
        $order = Order::where('id', $id)->where('status_order_id', 6)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('admin/detail-fullpayment-order', compact('order', 'titleApp'));
    }

    public function showOrderCompleted($id)
    {
        $titleApp = 'Pesanan Selesai';
        $order = Order::where('id', $id)->where('status_order_id', 7)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('admin/detail-completed-order', compact('order', 'titleApp'));

    }

    public function updateAcceptOrReject(Request $request, $id)
    {
        $request->validate([
            'status_order_id' => 'required',
        ]);

        $order = Order::where('id', $id)->where('status_order_id', 2);

        if (!$order) {
            return abort(404);
        }

        $order->update([
            'status_order_id' => $request->status_order_id,
            'reject_message' => $request->reject_message,
        ]);

        return redirect('admin/orders');

    }

    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'status_order_id' => 'required',
        ]);

        $order = Order::where('id', $id)->where('status_order_id', 4);

        if (!$order) {
            return abort(404);
        }

        $order->update([
            'status_order_id' => $request->status_order_id,
        ]);

        return redirect('admin/orders/payments');

    }

    public function updateOrderDone($id)
    {

        $order = Order::where('id', $id)->where('status_order_id', 6);

        if (!$order) {
            return abort(404);
        }

        $order->update([
            'status_order_id' => 7,
            'completed_at' => now()->format('Y-m-d H:i:s'),
        ]);

        return redirect('admin/orders/full-payments');

    }

    public function create()
    {
        $titleApp = 'Create Order';
        $brand = Brand::where('id', 1)->get()->first();
        $user = auth()->user();
        $packets = Packet::all();
        $studios = Studio::all();
        return view('create-order', compact('titleApp', 'brand', 'user', 'packets', 'studios'));
    }

    public function store(Request $request)
    {
        $codeOrder = 'ORD-' . date('Ymd') . '-' . uniqid();

        $order = $request->validate([
            'packet_id' => 'required|exists:packets,id',
            'studio_id' => 'required|exists:studios,id',
            'shooting_date' => 'required|date_format:Y-m-d',
        ]);

        $order['user_id'] = $request->id;
        $order['code_order'] = $codeOrder;
        $order['status_order_id'] = 2;

        Order::create($order);

        return redirect('orders/customers');

    }

    public function showOrderByCustomer()
    {
        $titleApp = 'List Order';
        $brand = Brand::where('id', 1)->get()->first();
        $user = auth()->user();
        $packets = Packet::all();
        $studios = Studio::all();
        $userId = auth()->id();
        $orders = Order::where('user_id', $userId)->get();
        return view('list-order', compact('titleApp', 'brand', 'user', 'packets', 'studios', 'orders'));

    }

    public function formCustomerPayment($id)
    {
        $titleApp = 'Form Payment';
        $brand = Brand::where('id', 1)->get()->first();
        $user = auth()->user();
        $order = Order::where('id', $id)->where('user_id', $user->id)->where('status_order_id', 3)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('payment-order', compact('titleApp', 'brand', 'order'));
    }

    public function updateCustomerPayment(Request $request, $id)
    {

        $request->validate([
            'payment_proof' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        $order = Order::where('id', $id)->where('user_id', $user->id)->where('status_order_id', 3)->get()->first();

        if (!$order) {
            return abort(404);
        }

        if ($request->hasFile('payment_proof')) {
            $payment_proof = $request->file('payment_proof');

            $customerFirstName = explode(' ', $user->customer->name)[0];
            $uploadDate = now()->format('YmdHis');
            $fileName = "{$customerFirstName}-{$uploadDate}-{$id}";

            $payment_proof->storeAs('payment_proofs', $fileName);

            $order->update([
                'payment_proof' => $fileName,
                'status_order_id' => 4,
                'paid_at' => now()->format('Y-m-d H:i:s'),
            ]);
        }
        return redirect('orders/customers');
    }
}
