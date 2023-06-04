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
                    <form action="{{ url('admin/users' . '/' . $user->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger float-right">Hapus
                            Data</button>
                    </form>
                </div>

            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
