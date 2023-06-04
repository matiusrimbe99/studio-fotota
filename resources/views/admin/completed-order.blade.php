@extends('admin_templates/app')
@section('title-app', $titleApp)
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
                            <h3 class="card-title">Tabel Pesanan Selesai</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Pemesan</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Paket Foto</th>
                                        <th>Studio</th>
                                        <th style="width: 50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1; ?>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $order->user->customer->name }}</td>
                                            <td>{{ $order->completed_at }}</td>
                                            <td>{{ $order->packet->packet_name }}</td>
                                            <td>{{ $order->studio->studio_name }}</td>
                                            <td class="text-center"><a
                                                    href="{{ url('admin/orders/' . $order->id . '/completed') }}">
                                                    <i class="nav-icon fas text-success fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
