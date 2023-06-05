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
                    <h3 class="card-title">Detail Data Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Pengguna</label>
                                <input value="{{ $user->customer->name }}" class="form-control" id="name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input value="{{ $user->username }}" class="form-control" id="username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input value="{{ $user->email }}" id="email" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input value="{{ $user->customer->address }}" class="form-control" id="address" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <input value="{{ $user->customer->gender }}" class="form-control" id="gender" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input value="{{ $user->customer->nomor_hp }}" class="form-control" id="nomor_hp" readonly>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <a href="{{ url('admin/users' . '/' . $user->id . '/edit') }}" class="btn btn-success float-left">Edit
                        Pengguna</a>
                    <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                        data-target="#modal-delete-user">
                        Hapus Pengguna
                    </button>

                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="modal-delete-user" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <form action="{{ url('admin/users' . '/' . $user->id) }}" method="POST">
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
