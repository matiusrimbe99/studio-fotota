<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderMethod;
use App\Models\Packet;
use App\Models\Studio;
use Carbon\Traits\Date;
use DataTables;
use Elibyy\TCPDF\Facades\TCPDF;
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

    public function generatePDFTiket($id)
    {
        $user = auth()->user();
        $admin = Admin::where('id', 1)->get()->first();

        $order = Order::where('id', $id)->where('status_order_id', 6)->where('user_id', $user->id)->get()->first();

        if (!$order) {
            return abort(404);
        }

        $brandName = Brand::where('id', 1)->get()->first()->brand_name;
        $printDate = now()->format('Y-m-d H:i:s');
        $invoiceDate = now()->format('dmY');
        $data = [
            'titleApp' => 'E-Tiket',
            'brandName' => $brandName,
            'printDate' => $printDate,
            'invoiceDate' => $invoiceDate,
        ];

        return view('e-tiket', compact('data', 'user', 'order', 'admin'));
    }

    public function cetakLaporan()
    {
        $header = array('No.', 'Nama Pemesan', 'Tanggal Bayar', 'Total Pembayaran', 'Keterangan');
        $orders = Order::where('status_order_id', 7)->get();

        $pdf = new TCPDF();
        $pdf::SetTitle('Laporan Pesanan');
        $pdf::AddPage();
        $pdf::WriteHTML('<h1 style="text-align:center;">Laporan Pesanan</h1>');
        $pdf::Ln(8);

        $pdf::SetFillColor(255, 0, 0);
        $pdf::SetTextColor(255);
        $pdf::SetDrawColor(128, 0, 0);
        $pdf::SetLineWidth(0.3);
        $pdf::SetFont('', 'B');

        $w = array(10, 45, 45, 45, 45);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $pdf::Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $pdf::Ln();

        $pdf::SetFillColor(224, 235, 255);
        $pdf::SetTextColor(0);
        $pdf::SetFont('');

        $fill = 0;
        foreach ($orders as $row) {
            $pdf::Cell($w[0], 6, $row->id, 'LR', 0, 'L', $fill);
            $pdf::Cell($w[1], 6, $row->user->customer->name, 'LR', 0, 'L', $fill);
            $pdf::Cell($w[2], 6, $row->completed_at, 'LR', 0, 'R', $fill);
            $pdf::Cell($w[3], 6, 'Rp. ' . number_format($row->packet->price + $row->studio->price, 2, ',', '.'), 'LR', 0, 'R', $fill);
            $pdf::Cell($w[4], 6, $row->statusOrder->status_name, 'LR', 0, 'R', $fill);
            $pdf::Ln();
            $fill = !$fill;
        }
        $pdf::Cell(array_sum($w), 0, '', 'T');

        $filename = 'Laporan Pesanan';
        return $pdf::Output($filename, 'I');
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

        if ($request->status_order_id == 3) {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
            $dataOrder = $order->get()->first();
            $params = array(
                'transaction_details' => array(
                    'order_id' => $dataOrder->code_order,
                    'gross_amount' => $dataOrder->packet->price + $dataOrder->studio->price,
                ),
                'customer_details' => array(
                    'first_name' => $dataOrder->user->customer->name,
                    'email' => $dataOrder->user->email,
                    'phone' => $dataOrder->user->customer->nomor_hp,
                ),
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $order->update([
                'status_order_id' => $request->status_order_id,
                'snap_token' => $snapToken,
            ]);
        } else if ($request->status_order_id == 1) {
            $order->update([
                'status_order_id' => $request->status_order_id,
                'reject_message' => $request->reject_message,
            ]);
        } else {
            return abort(400);
        }

        return redirect('admin/orders');

    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update([
                    'status_order_id' => 6,
                    'paid_at' => now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
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
        $orderMethod = OrderMethod::where('id', 1)->get()->first();
        $user = auth()->user();
        $packets = Packet::all();
        $studios = Studio::all();
        return view('create-order', compact('titleApp', 'brand', 'orderMethod', 'user', 'packets', 'studios'));
    }

    public function store(Request $request)
    {
        $codeOrder = 'ORD-' . date('YmdHis');

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
        $titleApp = 'Payment Gateway';
        $brand = Brand::where('id', 1)->get()->first();
        $contact = Contact::where('id', 1)->get()->first();
        $user = auth()->user();
        $order = Order::where('id', $id)->where('user_id', $user->id)->where('status_order_id', 3)->get()->first();

        if (!$order) {
            return abort(404);
        }

        return view('payment-order', compact('titleApp', 'brand', 'contact', 'order'));
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
