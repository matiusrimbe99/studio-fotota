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
                                <input id="price" class="form-control" value="{{ $packet->price }}" readonly>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ url('admin/packets') . '/' . $packet->id . '/edit' }}"
                                class="btn btn-primary float-left">Edit
                                Paket</a>

                            <form action="{{ url('admin/packets') . '/' . $packet->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger float-right">Hapus
                                    Paket</button>
                            </form>
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
@endsection
@section('script-app')
@endsection
