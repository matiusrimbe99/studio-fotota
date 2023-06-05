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
                            <h3 class="card-title">Detail Pembayaran Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data" action="{{ url('admin/orders/' . $order->id . '/payment') }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Pemesan</label>
                                    <input id="name" class="form-control" value="{{ $order->user->customer->name }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="date_paid">Tanggal Bayar</label>
                                    <input id="date_paid" class="form-control" value="{{ $order->paid_at }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="price_packet">Harga Paket Foto</label>
                                    <input id="price_packet" class="form-control" value="@currency($order->packet->price)" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="price_studio">Harga Studio</label>
                                    <input id="price_studio" class="form-control" value="@currency($order->studio->price)" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total">Total Harga</label>
                                    <input id="total" class="form-control" value="@currency($order->packet->price + $order->studio->price)" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="status_order_id">Aksi</label>
                                    <select name="status_order_id" id="status_order_id"
                                        class="form-control @error('status_order_id') is-invalid @enderror">
                                        <option value="">--- Pilih Aksi ---</option>
                                        <option value="6">Terima Pembayaran</option>
                                        <option value="5">Tolak Pembayaran</option>
                                    </select>
                                    @error('status_order_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ url('admin/orders/payments') }}"
                                    class="btn btn-secondary float-left">Kembali</a>
                                <button type="submit" class="btn btn-success float-right">Proses Pembayaran</button>
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
