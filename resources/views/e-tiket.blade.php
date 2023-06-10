<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $data['titleApp'] }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> {{ $data['brandName'] }}
                        <small class="float-right">Tanggal: {{ $data['printDate'] }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Dari
                    <address>
                        <strong>{{ $admin->name }}</strong><br>
                        {{ $admin->address }}<br>
                        Nomor HP: +{{ $admin->nomor_hp }} <br>
                        Email: {{ $admin->user->email }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Kepada
                    <address>
                        <strong>{{ $user->customer->name }}</strong><br>
                        {{ $user->customer->address }}<br>
                        Nomor HP: +{{ $user->customer->nomor_hp }}<br>
                        Email: {{ $user->email }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #{{ $data['invoiceDate'] }}</b><br>
                    <br>
                    <b>Kode Order:</b> {{ $order->code_order }}<br>
                    <b>Tanggal Bayar:</b> {{ $order->paid_at }}
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $order->packet->packet_name }}</td>
                                <td>{{ $order->packet->description }}</td>
                                <td>@currency($order->packet->price)</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>{{ $order->studio->studio_name }}</td>
                                <td>{{ $order->studio->description }}</td>
                                <td>@currency($order->studio->price)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Tanggal Bayar {{ $order->paid_at }}</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Total:</th>
                                <td><b>@currency($order->packet->price + $order->studio->price)</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
