@extends('admin_templates/app')
@section('title-app', $titleApp)
@section('css-app')
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Detail Pesanan Masuk</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Pelanggan</label>
                                    <input value="{{ $order->user->customer->name }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor HP</label>
                                    <input value="{{ $order->user->customer->nomor_hp }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Paket Foto</label>
                                    <input value="{{ $order->packet->packet_name }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Studio</label>
                                    <input value="{{ $order->studio->studio_name }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Pesan</label>
                                    <input value="{{ $order->created_at }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Alasan Tolak Pesanan</label>
                                    <input type="text" name="reject_message" class="form-control"
                                        placeholder="Isi jika kamu menolak pesanan">
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input value="{{ $order->user->customer->address }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Potret</label>
                                    <input value="{{ $order->shooting_date }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Paket Foto</label>
                                    <input value="{{ $order->packet->price }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga Studio</label>
                                    <input value="{{ $order->studio->price }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Total Harga</label>
                                    <input value="{{ $order->packet->price + $order->studio->price }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Aksi</label>
                                    <select class="form-control" name="status_order_id">
                                        <option value="">--- Pilih Aksi ---</option>
                                        <option value="3">Terima Pesanan</option>
                                        <option value="1">Tolak Pesanan</option>
                                    </select>
                                    <button type="submit" class="btn btn-warning mt-3 float-right">Proses Pesanan</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-footer">
                    <a href="{{ url('admin/orders') }}" class="btn btn-secondary float-left">Tutup</a>
                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
