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
                                    <label for="name">Nama Pelanggan</label>
                                    <input id="name" value="{{ $order->user->customer->name }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input id="nomor_hp" value="{{ $order->user->customer->nomor_hp }}"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="packet">Paket Foto</label>
                                    <input id="packet" value="{{ $order->packet->packet_name }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="studio">Studio</label>
                                    <input id="studio" value="{{ $order->studio->studio_name }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="date">Tanggal Pesan</label>
                                    <input id="date" value="{{ $order->created_at }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="reject_message">Alasan Tolak Pesanan</label>
                                    <input id="reject_message" type="text" name="reject_message"
                                        class="form-control @error('reject_message') is-invalid @enderror"
                                        placeholder="Isi jika kamu menolak pesanan">
                                    @error('reject_message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input id="address" value="{{ $order->user->customer->address }}" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="potret">Tanggal Potret</label>
                                    <input id="potret" value="{{ $order->shooting_date }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="price_packet">Harga Paket Foto</label>
                                    <input id="price_packet" value="@currency($order->packet->price)" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="price_studio">Harga Studio</label>
                                    <input id="price_studio" value="@currency($order->studio->price)" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="total">Total Harga</label>
                                    <input id="total" value="@currency($order->packet->price + $order->studio->price)" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="status_order_id">Aksi</label>
                                    <select id="status_order_id"
                                        class="form-control @error('status_order_id') is-invalid @enderror"
                                        name="status_order_id">
                                        <option value="">--- Pilih Aksi ---</option>
                                        <option value="3">Terima Pesanan</option>
                                        <option value="1">Tolak Pesanan</option>
                                    </select>
                                    @error('status_order_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
