@extends('admin_templates.app')
@section('title-app', $titleApp)
@section('css-app')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Pesanan Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="order-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pemesan</th>
                                        <th>Tanggal Potret</th>
                                        <th>Paket Foto</th>
                                        <th>Paket Studio</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#order-table").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('admin/orders') }}",
                "columns": [{
                        "data": 'number',
                        "name": 'number'
                    },
                    {
                        "data": 'name',
                        "name": 'name'
                    },
                    {
                        "data": 'shooting_date',
                        "name": 'shooting_date'
                    },
                    {
                        "data": 'packet_name',
                        "name": 'packet_name'
                    },
                    {
                        "data": 'studio_name',
                        "name": 'studio_name'
                    },
                    {
                        "data": 'action',
                        "name": 'action',
                        "orderable": false,
                        "searchable": false
                    },
                ]
            });
        });
    </script>
@endsection
