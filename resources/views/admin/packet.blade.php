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
                            <a href="{{ url('admin/packets/create') }}" class="btn btn-success mb-3 float-right">Tambah
                                Paket
                                Foto</a>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Paket</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th style="width: 50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($packets as $packet)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $packet->packet_name }}</td>
                                            <td>{{ $packet->description }}</td>
                                            <td>{{ $packet->price }}</td>
                                            <td class="text-center"><a
                                                    href="{{ url('admin/packets') . '/' . $packet->id }}">
                                                    <i class="nav-icon fas text-success fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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