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
                            <h3 class="card-title">Tabel Data Pengguna</h3>
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ url('admin/users/create') }}"
                                        class="btn btn-success mb-3 float-right">Tambah
                                        Pengguna</a>
                                </div>
                            </div>
                            <table id="user-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor HP</th>
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
            $("#user-table").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('admin/users') }}",
                "columns": [{
                        "data": 'number',
                        "name": 'number'
                    },
                    {
                        "data": 'name',
                        "name": 'name'
                    },
                    {
                        "data": 'email',
                        "name": 'email'
                    },
                    {
                        "data": 'nomor_hp',
                        "name": 'nomor_hp'
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
