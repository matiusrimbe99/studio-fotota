@extends('admin_templates.app')
@section('title-app')
    Paket Foto
@endsection
@section('css-app')
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Paket Foto</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button class="btn btn-success mb-3 float-right">Tambah
                                Paket
                                Foto</button>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Paket</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kelulusan Wisuda
                                        </td>
                                        <td>Paket dengan harga murah</td>
                                        <td>Rp. 200.000,00</td>
                                        <td>Detail</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Kelulusan Wisuda
                                        </td>
                                        <td>Paket dengan harga murah</td>
                                        <td>Rp. 200.000,00</td>
                                        <td>Detail</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Kelulusan Wisuda
                                        </td>
                                        <td>Paket dengan harga murah</td>
                                        <td>Rp. 200.000,00</td>
                                        <td>Detail</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@section('script-app')
@endsection
