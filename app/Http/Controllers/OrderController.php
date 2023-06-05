<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Packet;
use App\Models\Studio;
use Carbon\Traits\Date;
use DataTables;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $titleApp = 'Pesanan Masuk';

        if ($request->ajax()) {
            $orders = Order::where('status_order_id', 2)->get();

            return Datatables::of($orders)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('name', function ($row) {
                return $row->user->customer->name;
            })->addColumn('packet_name', function ($row) {
                return $row->packet->packet_name;
            })->addColumn('studio_name', function ($row) {
                return $row->studio->studio_name;
            })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . "orders/" . $row->id . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'name', 'packet_name', 'studio_name', 'action'])->make(true);
        }

        return view('admin/order', compact('titleApp'));

    }

    public function listAllOrder(Request $request)
    {
        $titleApp = 'Semua Pesanan';

        if ($request->ajax()) {
            $orders = Order::all();
            return Datatables::of($orders)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('name', function ($row) {
                return $row->user->customer->name;
            })->addColumn('created_at', function ($row) {
                return date_format($row->created_at, 'Y-m-d H:i:s');
            })->addColumn('status_name', function ($row) {
                return $row->statusOrder->status_name;
            })->addColumn('total_price', function ($row) {
                return $row->packet->price + $row->studio->price;
            })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . $row->id . "/all" . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'name', 'created_at', 'status_name', 'total_price', 'action'])->make(true);
        }

        return view('admin/all-order', compact('titleApp'));
    }

    public function listOrderPayments(Request $request)
    {
        $titleApp = 'Pembayaran';

        if ($request->ajax()) {
            $orders = Order::where('status_order_id', 4)->get();

            return Datatables::of($orders)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('name', function ($row) {
                return $row->user->customer->name;
            })->addColumn('packet_name', function ($row) {
                return $row->packet->packet_name;
            })->addColumn('studio_name', function ($row) {
                return $row->studio->studio_name;
            })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . $row->id . "/payment" . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'name', 'packet_name', 'studio_name', 'action'])->make(true);
        }

        return view('admin/payment-order', compact('titleApp'));

    }

    public function listOrderFullPayments(Request $request)
    {
        $titleApp = 'Pesanan Lunas';

        if ($request->ajax()) {
            $orders = Order::where('status_order_id', 6)->get();
            return Datatables::of($orders)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('name', function ($row) {
                return $row->user->customer->name;
            })->addColumn('packet_name', function ($row) {
                return $row->packet->packet_name;
            })->addColumn('studio_name', function ($row) {
                return $row->studio->studio_name;
            })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . $row->id . "/full-payment" . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'name', 'packet_name', 'studio_name', 'action'])->make(true);
        }

        return view('admin/fullpayment-order', compact('titleApp'));
    }

    public function listOrderCompleted(Request $request)
    {
        $titleApp = 'Pesanan Selesai';

        if ($request->ajax()) {
            $orders = Order::where('status_order_id', 7)->get();
            return Datatables::of($orders)->addIndexColumn()
                ->addColumn('number', function ($row) {
                    static $number = 1;
                    return $number++;
                })->addColumn('name', function ($row) {
                return $row->user->customer->name;
            })->addColumn('packet_name', function ($row) {
                return $row->packet->packet_name;
            })->addColumn('studio_name', function ($row) {
                return $row->studio->studio_name;
            })->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-sm btn-info" href="' . $row->id . "/completed" . '"><i class="fas fa-edit"></i> View</a>';
                return $btn;
            })->rawColumns(['number', 'name', 'packet_name', 'studio_name', 'action'])->make(true);
        }

        return view('admin/completed-order', compact('titleApp'));
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
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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
