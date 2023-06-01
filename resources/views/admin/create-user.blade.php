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
                    <h3 class="card-title">Tambah Data Pengguna</h3>
                </div>

                <form action="{{ url('admin/users') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Pengguna</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Masukkan nama pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        placeholder="Masukkan username pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Masukkan email pelanggan">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Masukkan alamat pelanggan">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option disabled>Pilih Jenis Kelamin</option>
                                        <option value="1">Laki-Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input type="text" id="nomor_hp" name="nomor_hp" class="form-control"
                                        placeholder="Masukkan nomor hp pelanggan">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary float-left">Batalkan</a>
                        <button type="submit" class="btn btn-success float-right">Tambah Pengguna</button>
                    </div>
                </form>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script-app')
@endsection
