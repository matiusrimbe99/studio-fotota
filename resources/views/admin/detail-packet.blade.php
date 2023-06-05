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
                            <h3 class="card-title">Detail Paket Foto</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="packet_name">Nama Paket</label>
                                <input id="packet_name" class="form-control" value="{{ $packet->packet_name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Paket</label>
                                <input id="description" class="form-control" value="{{ $packet->description }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga Paket</label>
                                <input id="price" class="form-control" value="@currency($packet->price)" readonly>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ url('admin/packets') . '/' . $packet->id . '/edit' }}"
                                class="btn btn-primary float-left">Edit
                                Paket</a>
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                                data-target="#modal-delete-packet">
                                Hapus Paket
                            </button>

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
                            <h3 class="card-title">Gambar Paket Foto</h3>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid pad" src="{{ $packet->image }}" alt="studio-image">
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

    <!-- Modal -->
    <div class="modal fade" id="modal-delete-packet" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Paket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <form action="{{ url('admin/packets') . '/' . $packet->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-success">Ya, Hapus</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('script-app')
@endsection
