@extends('admin_templates.app')
@section('title-app', $titleApp)
@section('css-app')
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pesanan Selesai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Pemesan</label>
                                <input id="name" class="form-control" value="{{ $order->user->customer->name }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Bayar</label>
                                <input id="date" class="form-control" value="{{ $order->paid_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="date_success">Tanggal Selesai</label>
                                <input id="date_success" class="form-control" value="{{ $order->completed_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="potret">Tanggal Pemotretan</label>
                                <input id="potret" class="form-control" value="{{ $order->shooting_date }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="total">Total Harga</label>
                                <input id="total" class="form-control" value="@currency($order->packet->price + $order->studio->price)" readonly>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ url('admin/orders/completed') }}" class="btn btn-secondary float-left">Kembali</a>

                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Gambar Bukti Pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ $order->payment_proof }}"><img class="img-fluid pad"
                                    src="{{ $order->payment_proof }}" alt="payment-proof"></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
