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
                            <h3 class="card-title">Detail Pembayaran Lunas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data" action="{{ url('admin/orders/' . $order->id . '/done') }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Pemesan</label>
                                    <input class="form-control" value="{{ $order->user->customer->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Bayar</label>
                                    <input class="form-control" value="{{ $order->paid_at }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Pemotretan</label>
                                    <input class="form-control" value="{{ $order->shooting_date }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="">Total Harga</label>
                                    <input class="form-control" value="{{ $order->packet->price + $order->studio->price }}"
                                        readonly>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ url('admin/orders/full-payments') }}"
                                    class="btn btn-secondary float-left">Kembali</a>
                                <button type="submit" class="btn btn-success float-right">Tandai Pesanan Selesai</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">File E-Tiket Pemesanan</h3>
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
